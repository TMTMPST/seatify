<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;
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

    public function buatPesanan(Request $request)
    {
        $request->validate([
            'jumlahTiket' => 'required|integer|min:1',
            'kategoriTiket' => 'required|string',
            'kodePromo' => 'nullable|string',
            'konser_id' => 'required|exists:daftar_konser,id'
        ]);

        $user = Auth::user();
        $jumlahTiket = (int) $request->jumlahTiket;
        $kategori = $request->kategoriTiket;
        $kodePromo = strtoupper(trim($request->kodePromo));

        // Perhitungan total harga tiket
        $hargaTiket = 200000;
        $tambahanVIP = $kategori === 'vip' ? 100000 : 0;
        $hargaTotal = ($hargaTiket + $tambahanVIP) * $jumlahTiket;

        // Daftar kode promo dan diskonnya
        $promoDiskon = [
            'RAMADHAN2025' => 0.2, 
            'NATAL2025' => 0.2,
            'TAHUNBARU2026' => 0.5
        ];

        // Hitung diskon berdasarkan kode promo
        $diskon = isset($promoDiskon[$kodePromo]) ? $promoDiskon[$kodePromo] * $hargaTotal : 0;
        $totalPembayaran = $hargaTotal - $diskon;

        $orderId = 'ORDER-' . time();

        $transactionDetails = [
            'order_id' => $orderId,
            'gross_amount' => $totalPembayaran
        ];

        $customerDetails = [
            'first_name' => $user->name,
            'email' => $user->email,
            'phone' => '08123456789'
        ];

        $params = [
            'transaction_details' => $transactionDetails,
            'customer_details' => $customerDetails
        ];

        try {
            $snapToken = Snap::createTransaction($params);

            // Simpan transaksi ke database
            Pembayaran::create([
                'user_id' => $user->id,
                'konser_id' => $request->konser_id,
                'order_id' => $orderId,
                'total_pembayaran' => $totalPembayaran,
                'status' => 'pending'
            ]);

            return response()->json(['redirect_url' => $snapToken->redirect_url]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function handleNotification(Request $request)
    {
        $serverKey = env('MIDTRANS_SERVER_KEY');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed != $request->signature_key) {
            return response()->json(['error' => 'Invalid signature'], 403);
        }

        $transaction = Pembayaran::where('order_id', $request->order_id)->first();

        if (!$transaction) {
            return response()->json(['error' => 'Transaction not found'], 404);
        }

        if ($request->transaction_status == 'settlement' || $request->transaction_status == 'capture') {
            $transaction->update(['status' => 'paid']);
        } elseif ($request->transaction_status == 'expire') {
            $transaction->update(['status' => 'expired']);
        } elseif ($request->transaction_status == 'cancel') {
            $transaction->update(['status' => 'canceled']);
        }

        return response()->json(['message' => 'Transaction status updated']);
    }
}