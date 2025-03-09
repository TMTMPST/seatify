<?php

namespace App\Http\Controllers;

use App\Models\Band;
use Illuminate\Http\Request;

class BandController extends Controller
{
    public function index()
    {
        $band = Band::with(['members', 'songs', 'socialMedia'])->first();

        // Pastikan ada data sebelum mengakses relasi
        $anggota = $band ? $band->members : collect([]);
        $lagu = $band ? $band->songs->pluck('url') : collect([]);

        return view('components.ui.biodata_artis', [
            'band' => $band,
            'anggota' => $anggota,
            'lagu' => $lagu
        ]);
    }
}

