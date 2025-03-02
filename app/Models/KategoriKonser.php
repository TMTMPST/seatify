<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriKonser extends Model
{
    use HasFactory;

    protected $table = 'kategori_konser';

    protected $fillable = ['nama'];

    public function konser()
    {
        return $this->hasMany(DaftarKonser::class, 'kategori_id');
    }
}
