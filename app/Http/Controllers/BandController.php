<?php

namespace App\Http\Controllers;

use App\Models\Band;
use App\Models\BandMember;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class BandController extends Controller
{
    public function index()
    {
        $band = Band::with('members')->first();

        return view('detail_concert', compact('band'));
    }
    public function Adminindex()
    {
        $bands = Band::with(['members', 'socialMedia'])->get();
        return view('admin.band', compact('bands'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        // Simpan banner jika ada
        $bannerPath = $request->file('banner_image')->store('images/banner_band', 'public');

        // Simpan data band
        Band::create([
            'name' => $request->name,
            'banner_image' => $bannerPath,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.band.index')->with('success', 'Band berhasil ditambahkan!');
    }
}
