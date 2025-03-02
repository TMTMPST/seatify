<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuyController extends Controller
{
    public function calculateTotal(Request $request)
    {
        // Ambil data dari request
        $jumlahTiket = (int) $request->input('jumlahTiket');
        $kategori = $request->input('kategoriTiket');
        $kodePromo = strtoupper(trim($request->input('kodePromo')));

        // Harga dasar tiket
        $hargaTiket = 200000;

        // Penyesuaian harga berdasarkan kategori
        $tambahanVIP = $kategori === 'vip' ? 100000 : 0;

        // Hitung harga total sebelum diskon
        $hargaTotal = ($hargaTiket + $tambahanVIP) * $jumlahTiket;

        // Cek apakah kode promo berlaku
        $diskon = 0;
        if ($kodePromo === 'RAMADHAN2025') {
            $diskon = 0.2 * $hargaTotal; // Diskon 20%
        }

        // Harga akhir setelah diskon
        $totalPembayaran = $hargaTotal - $diskon;

        return response()->json([
            'jumlah_tiket' => $jumlahTiket,
            'kategori' => ucfirst($kategori),
            'harga' => 'Rp ' . number_format($hargaTotal, 0, ',', '.'),
            'diskon' => $diskon > 0 ? '-Rp ' . number_format($diskon, 0, ',', '.') : '-',
            'total' => 'Rp ' . number_format($totalPembayaran, 0, ',', '.'),
        ]);
    }
}
