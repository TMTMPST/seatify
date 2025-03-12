<?php

namespace App\Http\Controllers;

use App\Models\DaftarKonser;
use App\Models\KategoriKonser;
use App\Models\Band;
use Illuminate\Http\Request;

class DaftarKonserController extends Controller
{
    public function index()
    {
        $konser = DaftarKonser::with('kategori')->get();
        return view('admin.konser', compact('konser'));
    }

    public function create()
    {
        $kategori = KategoriKonser::all();
        return view('admin.functions.tambah_konser', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori_konser,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'ketersediaan_tiket' => 'required|in:tersedia,tidak tersedia', // Tetap gunakan validasi ini
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan gambar ke public/images/konser/
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarNama = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('images/konser'), $gambarNama);
            $gambarPath = 'images/konser/' . $gambarNama;
        } else {
            return redirect()->back()->with('error', 'Gambar tidak ditemukan.');
        }

        // Konversi 'tersedia' -> 1 dan 'tidak tersedia' -> 0
        $ketersediaan = $request->ketersediaan_tiket === 'tersedia' ? 1 : 0;

        // Simpan data ke database
        DaftarKonser::create([
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'ketersediaan_tiket' => $ketersediaan, // Disimpan sebagai 0 atau 1
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('konser.index')->with('success', 'Konser berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(DaftarKonser $konser)
    {
        return view('konser.show', compact('konser'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $konser = DaftarKonser::findOrFail($id);
        $kategori = KategoriKonser::all();

        return view('admin.functions.edit_konser', compact('konser', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori_konser,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'ketersediaan_tiket' => 'required|in:tersedia,tidak tersedia', // Tetap gunakan validasi ini
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $konser = DaftarKonser::findOrFail($id);

        // Konversi nilai 'tersedia' -> 1 dan 'tidak tersedia' -> 0
        $ketersediaan = $request->ketersediaan_tiket === 'tersedia' ? 1 : 0;

        // Periksa apakah gambar diupdate
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarNama = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('images/konser'), $gambarNama);
            $gambarPath = 'images/konser/' . $gambarNama;

            // Hapus gambar lama jika ada
            if (file_exists(public_path($konser->gambar))) {
                unlink(public_path($konser->gambar));
            }

            $konser->gambar = $gambarPath;
        }

        // Simpan perubahan
        $konser->update([
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'ketersediaan_tiket' => $ketersediaan, // Disimpan sebagai 0 atau 1
        ]);

        return redirect()->route('konser.index')->with('success', 'Konser berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DaftarKonser $konser)
    {
        // Hapus gambar jika ada
        if ($konser->gambar && file_exists(public_path($konser->gambar))) {
            unlink(public_path($konser->gambar));
        }

        $konser->delete();

        return redirect()->route('konser.index')->with('success', 'Konser berhasil dihapus');
    }
}
