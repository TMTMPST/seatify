<?php

namespace App\Http\Controllers;

use App\Models\Band;
use App\Models\BandMember;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

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
        $band = Band::create([
            'name' => $request->name,
            'banner_image' => $bannerPath,
            'description' => $request->description,
        ]);

        // Redirect to tambah anggota page for this band
        return redirect()->route('admin.band.anggota.create', ['band' => $band->id])->with('success', 'Band berhasil ditambahkan!');
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


    public function storeMember(Request $request, $bandId)
    {
        Log::info('Store member method called');
        $band = Band::findOrFail($bandId);

        $validatedData = $request->validate([
            'members.*.name' => 'required|string|max:255',
            'members.*.role' => 'required|string|max:255',
            'members.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        foreach ($validatedData['members'] ?? [] as $index => $memberData) {
            $imagePath = '';

            if ($request->hasFile("members.$index.image")) {
                $image = $request->file("members.$index.image");
                $imagePath = $image->store('images/band_members', 'public');
            }

            BandMember::create([
                'band_id' => $band->id,
                'name' => $memberData['name'],
                'role' => $memberData['role'],
                'image' => $imagePath,
            ]);
        }

        return redirect()->route('admin.band.index')->with('success', 'Anggota band berhasil ditambahkan!');
    }

    public function createMember($bandId)
    {
        $band = Band::findOrFail($bandId);
        return view('admin.functions.tambah_anggota', compact('band'));
    }

    // ✅ Fungsi Edit Anggota
    public function editMember($bandId, $anggotaId)
    {
        $band = Band::findOrFail($bandId);
        $anggota = BandMember::findOrFail($anggotaId);

        return view('admin.functions.edit_anggota', compact('band', 'anggota'));

    }

    // ✅ Fungsi Update Anggota
    public function updateMember(Request $request, $bandId, $anggotaId)
    {
        $band = Band::findOrFail($bandId);
        $anggota = BandMember::findOrFail($anggotaId);

        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Jika ada gambar baru, hapus yang lama
        if ($request->hasFile('image')) {
            if ($anggota->image) {
                Storage::disk('public')->delete($anggota->image);
            }
            $imagePath = $request->file('image')->store('images/band_members', 'public');
            $anggota->image = $imagePath;
        }

        // Update data anggota
        $anggota->update([
            'name' => $request->name,
            'role' => $request->role,
            'image' => $anggota->image,
        ]);

        return redirect()->route('admin.band.index')->with('success', 'Data Anggota Band berhasil Diperbarui.');
    }
}
