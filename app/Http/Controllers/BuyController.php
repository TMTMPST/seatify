<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class BuyController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    // Mengizinkan CORS untuk API response
    private function corsResponse($data, $status = 200)
    {
        return response()->json($data, $status)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE')
            ->header('Access-Control-Allow-Headers', 'Content-Type, X-CSRF-TOKEN');
    }

    public function buatPesanan(Request $request)
    {
        try {
            $request->validate([
                'jumlahTiket' => 'required|integer',
                'kategoriTiket' => 'required|string',
                'konser_id' => 'required|integer',
            ]);

            // Atur harga berdasarkan kategori tiket
            $hargaPerTiket = $request->kategoriTiket === 'vip' ? 200000 : 100000;
            $totalHarga = $hargaPerTiket * $request->jumlahTiket;

            // Cek apakah ada kode promo dan hitung diskon jika berlaku
            if (!empty($request->kodePromo)) {
                $diskon = 50000; // Misal: diskon Rp50.000 jika ada kode promo valid
                $totalHarga = max(0, $totalHarga - $diskon);
            }

            // Buat order ID unik
            $orderId = uniqid();

            // Buat transaksi untuk Midtrans
            $transaction = [
                'transaction_details' => [
                    'order_id' => $orderId,
                    'gross_amount' => $totalHarga, // Total harga sesuai perhitungan
                ],
                'customer_details' => [
                    'first_name' => Auth::check()
                        ? (Auth::user()->name ?: explode('@', Auth::user()->email)[0])
                        : 'Guest' . rand(1000, 9999),
                    'email' => Auth::check() ? Auth::user()->email : 'guest' . rand(1000, 9999) . '@example.com',
                    'phone' => '08123456789',
                ]
            ];

            // Dapatkan Snap Token dari Midtrans
            $snapToken = Snap::getSnapToken($transaction);

            return $this->corsResponse([
                'status' => 'success',
                'order_id' => $orderId,
                'snap_token' => $snapToken
            ]);
        } catch (\Exception $e) {
            return $this->corsResponse(['error' => $e->getMessage()], 500);
        }
    }

    public function handleMidtransCallback(Request $request)
    {
        try {
            $orderId = $request->query('order_id');

            // Ambil status transaksi dari Midtrans
            $serverKey = config('midtrans.server_key');
            $url = "https://api.sandbox.midtrans.com/v2/{$orderId}/status";

            $response = Http::withBasicAuth($serverKey, '')->get($url);
            $status = $response->json()['transaction_status'] ?? 'pending';

            return response()->json(['order_id' => $orderId, 'status' => $status]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function hitungTotal(Request $request)
    {
        try {
            $hargaTiket = [
                'vip' => 500000,
                'reguler' => 200000
            ];

            $jumlah = $request->input('jumlahTiket');
            $kategori = $request->input('kategoriTiket');
            $kodePromo = $request->input('kodePromo');

            if (!isset($hargaTiket[$kategori])) {
                return $this->corsResponse(['error' => 'Kategori tiket tidak valid'], 400);
            }

            $total = $jumlah * $hargaTiket[$kategori];

            // Cek diskon jika ada kode promo
            $diskon = "-";
            if ($kodePromo === "DISKON50") {
                $diskon = "50%";
                $total *= 0.5;
            }

            return $this->corsResponse([
                'total' => number_format($total, 0, ',', '.'),
                'diskon' => $diskon
            ]);
        } catch (\Exception $e) {
            return $this->corsResponse(['error' => $e->getMessage()], 500);
        }
    }


    public function handleNotification(Request $request)
    {
        $serverKey = env('MIDTRANS_SERVER_KEY');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed != $request->signature_key) {
            return $this->corsResponse(['error' => 'Invalid signature'], 403);
        }

        $transaction = Pembayaran::where('order_id', $request->order_id)->first();

        if (!$transaction) {
            return $this->corsResponse(['error' => 'Transaction not found'], 404);
        }

        if ($request->transaction_status == 'settlement' || $request->transaction_status == 'capture') {
            $transaction->update(['status' => 'paid']);
        } elseif ($request->transaction_status == 'expire') {
            $transaction->update(['status' => 'expired']);
        } elseif ($request->transaction_status == 'cancel') {
            $transaction->update(['status' => 'canceled']);
        }

        return $this->corsResponse(['message' => 'Transaction status updated']);
    }
}
