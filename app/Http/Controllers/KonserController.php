<?php

namespace App\Http\Controllers;
use App\Models\KategoriKonser;
use App\Models\DaftarKonser;

use Illuminate\Http\Request;

class KonserController extends Controller
{
    public function index(Request $request)
    {
        $kategori = $request->kategori;
        $konser = DaftarKonser::whereHas('kategori', function ($query) use ($kategori) {
            $query->where('nama', $kategori);
        })->get();

        return view("widget.{$kategori}_concert", compact('konser'))->render();
    }
}
