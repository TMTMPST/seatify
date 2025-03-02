<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarKonser extends Model
{
    use HasFactory;

    protected $table = 'daftar_konser';

    protected $fillable = ['kategori_id', 'gambar', 'judul', 'deskripsi', 'ketersediaan_tiket'];

    public function kategori()
    {
        return $this->belongsTo(KategoriKonser::class, 'kategori_id');
    }
}
