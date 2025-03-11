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
    // ✅ Fungsi Edit
    public function edit($id)
    {
        $band = Band::findOrFail($id);
        return view('admin.functions.edit_band', compact('band'));
    }

    // ✅ Fungsi Update
    public function update(Request $request, $id)
    {
        $band = Band::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        // Jika ada banner baru, hapus yang lama
        if ($request->hasFile('banner_image')) {
            if ($band->banner_image) {
                Storage::disk('public')->delete($band->banner_image);
            }
            $bannerPath = $request->file('banner_image')->store('images/banner_band', 'public');
            $band->banner_image = $bannerPath;
        }

        // Update data band
        $band->update([
            'name' => $request->name,
            'description' => $request->description,
            'banner_image' => $band->banner_image,
        ]);

        return redirect()->route('admin.band.index')->with('success', 'Band berhasil diperbarui!');
    }

    // ✅ Fungsi Delete
    public function destroy($id)
    {
        $band = Band::findOrFail($id);

        // Hapus banner jika ada
        if ($band->banner_image) {
            Storage::disk('public')->delete($band->banner_image);
        }

        // Hapus band dari database
        $band->delete();

        return redirect()->route('admin.band.index')->with('success', 'Band berhasil dihapus!');
    }
}
