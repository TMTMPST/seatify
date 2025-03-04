<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Order;

class BuyController extends Controller
{
    private array $promoDiskon = [
        'RAMADHAN2025' => 0.2,
        'NATAL2025' => 0.2,
        'TAHUNBARU2026' => 0.5
    ];

    private int $hargaTiket = 200000;
    private int $tambahanVIP = 100000;

    public function __construct()
    {
        $this->setMidtransConfig();
    }

    private function setMidtransConfig(): void
    {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    private function hitungHargaTotal(int $jumlahTiket, string $kategori, ?string $kodePromo): int
    {
        $total = ($this->hargaTiket + ($kategori === 'vip' ? $this->tambahanVIP : 0)) * $jumlahTiket;
        $diskon = $this->promoDiskon[$kodePromo] ?? 0;
        return (int) round($total - ($total * $diskon));
    }

    public function hitungTotal(Request $request)
    {
        $validated = $request->validate([
            'jumlahTiket' => 'required|integer|min:1',
            'kategoriTiket' => 'required|string',
            'kodePromo' => 'nullable|string'
        ]);

        $totalPembayaran = $this->hitungHargaTotal(
            $validated['jumlahTiket'],
            $validated['kategoriTiket'],
            strtoupper(trim($validated['kodePromo'] ?? ''))
        );

        return response()->json([
            'total' => 'Rp ' . number_format($totalPembayaran, 0, ',', '.')
        ]);
    }

    public function buatPesanan(Request $request)
    {
        $validated = $request->validate([
            'jumlahTiket' => 'required|integer|min:1',
            'kategoriTiket' => 'required|string',
            'kodePromo' => 'nullable|string'
        ]);

        $totalPembayaran = $this->hitungHargaTotal(
            $validated['jumlahTiket'],
            $validated['kategoriTiket'],
            strtoupper(trim($validated['kodePromo'] ?? ''))
        );

        $orderId = 'ORDER-' . time();

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $totalPembayaran
            ],
            'customer_details' => [
                'first_name' => 'Nama',
                'email' => 'email@example.com',
                'phone' => '08123456789'
            ]
        ];

        try {
            $snapToken = Snap::createTransaction($params);
            return response()->json(['redirect_url' => $snapToken->redirect_url]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}