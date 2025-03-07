<?php

namespace App\Http\Controllers;

use App\Models\DaftarKonser;
use App\Models\KategoriKonser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DaftarKonserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $konser = DaftarKonser::with('kategori')->get();
        return view('konser.index', compact('konser'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = KategoriKonser::all();
        return view('konser.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori_konser,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'ketersediaan_tiket' => 'required|in:tersedia,tidak tersedia',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambarPath = $request->file('gambar')->store('konser', 'public');

        DaftarKonser::create([
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'ketersediaan_tiket' => $request->ketersediaan_tiket,
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
    public function edit(DaftarKonser $konser)
    {
        $kategori = KategoriKonser::all();
        return view('konser.edit', compact('konser', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DaftarKonser $konser)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori_konser,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'ketersediaan_tiket' => 'required|in:tersedia,tidak tersedia',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'ketersediaan_tiket' => $request->ketersediaan_tiket,
        ];

        if ($request->hasFile('gambar')) {
            // Delete old image
            if ($konser->gambar) {
                Storage::disk('public')->delete($konser->gambar);
            }
            
            // Store new image
            $gambarPath = $request->file('gambar')->store('konser', 'public');
            $data['gambar'] = $gambarPath;
        }

        $konser->update($data);

        return redirect()->route('konser.index')->with('success', 'Konser berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DaftarKonser $konser)
    {
        // Delete image file
        if ($konser->gambar) {
            Storage::disk('public')->delete($konser->gambar);
        }
        
        $konser->delete();

        return redirect()->route('konser.index')->with('success', 'Konser berhasil dihapus');
    }
}