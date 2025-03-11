<?php

namespace App\Http\Controllers;

use App\Models\Band;
use App\Models\BandMember;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function createAnggota($band_id)
    {
        $band = Band::findOrFail($band_id);
        return view('admin.functions.tambah_anggota', compact('band'));
    }
    public function storeAnggota(Request $request, $band_id)
    {
        $request->validate([
            'name.*' => 'required|string|max:255',
            'role.*' => 'required|string|max:255',
            // 'image.*' tidak perlu diuji dulu
        ]);

        $band = Band::findOrFail($band_id);

        foreach ($request->name as $index => $nama) {
            $anggota = new BandMember();
            $anggota->band_id = $band->id;
            $anggota->name = $nama;
            $anggota->role = $request->role[$index];

            // **Tanpa gambar dulu**
            // $anggota->image = null;

            $anggota->save();
        }

        return redirect()->route('admin.band.index')->with('success', 'Anggota band berhasil ditambahkan!');
    }
}
