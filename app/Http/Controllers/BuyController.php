<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Order;

class BuyController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function hitungTotal(Request $request)
    {
        $request->validate([
            'jumlahTiket' => 'required|integer|min:1',
            'kategoriTiket' => 'required|string',
            'kodePromo' => 'nullable|string'
        ]);

        $jumlahTiket = (int) $request->jumlahTiket;
        $kategori = $request->kategoriTiket;
        $kodePromo = strtoupper(trim($request->kodePromo));

        $hargaTiket = 200000;
        $tambahanVIP = $kategori === 'vip' ? 100000 : 0;
        $hargaTotal = ($hargaTiket + $tambahanVIP) * $jumlahTiket;
        $diskon = $kodePromo === 'RAMADHAN2025' ? 0.2 * $hargaTotal : 0;
        $totalPembayaran = $hargaTotal - $diskon;

        return response()->json([
            'diskon' => $diskon > 0 ? '-Rp ' . number_format($diskon, 0, ',', '.') : '-',
            'total' => 'Rp ' . number_format($totalPembayaran, 0, ',', '.')
        ]);
    }

    public function buatPesanan(Request $request)
    {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $request->validate([
            'jumlahTiket' => 'required|integer|min:1',
            'kategoriTiket' => 'required|string',
            'kodePromo' => 'nullable|string'
        ]);

        $jumlahTiket = (int) $request->jumlahTiket;
        $kategori = $request->kategoriTiket;
        $kodePromo = strtoupper(trim($request->kodePromo));

        // Perhitungan total harga tiket
        $hargaTiket = 200000;
        $tambahanVIP = $kategori === 'vip' ? 100000 : 0;
        $hargaTotal = ($hargaTiket + $tambahanVIP) * $jumlahTiket;
        $diskon = $kodePromo === 'RAMADHAN2025' ? 0.2 * $hargaTotal : 0;
        $totalPembayaran = $hargaTotal - $diskon;

        $orderId = 'ORDER-' . time();

        $transactionDetails = [
            'order_id' => $orderId,
            'gross_amount' => $totalPembayaran // Gunakan total yang sesuai
        ];

        $customerDetails = [
            'first_name' => 'Nama',
            'email' => 'email@example.com',
            'phone' => '08123456789'
        ];

        $params = [
            'transaction_details' => $transactionDetails,
            'customer_details' => $customerDetails
        ];

        try {
            $snapToken = Snap::createTransaction($params);
            return response()->json(['redirect_url' => $snapToken->redirect_url]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
