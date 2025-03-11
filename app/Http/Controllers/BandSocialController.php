<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Band;
use App\Models\SocialMedia;

class BandSocialController extends Controller
{
    public function create(Band $band)
    {
        return view('admin.functions.tambah_social', compact('band'));
    }

    public function store(Request $request, Band $band)
    {
        $request->validate([
            'platform' => 'required|string|max:50',
            'url' => 'required|string|max:255|url',
        ]);

        SocialMedia::create([
            'band_id' => $band->id,
            'platform' => $request->platform,
            'url' => $request->url,
        ]);

        return redirect()->route('admin.band.index')->with('success', 'Data sosial media berhasil ditambahkan.');
    }
}
