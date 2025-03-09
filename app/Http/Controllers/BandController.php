<?php

namespace App\Http\Controllers;

use App\Models\Band;
use Illuminate\Http\Request;

class BandController extends Controller
{
    public function index()
    {
        $band = Band::with(['members'])->first();

        return view('components.ui.biodata_artis', [
            'band' => $band,
            'anggota' => $band ? $band->members : collect([])
        ]);
    }
}
