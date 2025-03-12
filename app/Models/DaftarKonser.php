<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarKonser extends Model
{
    use HasFactory;

    protected $table = 'daftar_konser';

    protected $fillable = ['kategori_id', 'band_id', 'gambar', 'judul', 'deskripsi', 'ketersediaan_tiket']; // Tambahkan 'band_id'

    protected $casts = [
        'ketersediaan_tiket' => 'boolean',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriKonser::class, 'kategori_id');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'konser_id');
    }

    public function band()
    {
        return $this->belongsTo(Band::class, 'band_id'); // Relasi ke Band
    }
}