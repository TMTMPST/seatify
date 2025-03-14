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

            $orderId = uniqid();

            $transaction = [
                'transaction_details' => [
                    'order_id' => $orderId,
                    'gross_amount' => 100000, // Sesuaikan harga tiket
                ],
                'customer_details' => [
                    'first_name' => 'Nama',
                    'email' => 'email@example.com',
                    'phone' => '08123456789',
                ]
            ];

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
