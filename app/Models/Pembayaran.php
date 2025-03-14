<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';

    protected $fillable = [
        'user_id',
        'konser_id',
        'order_id',
        'jumlah_tiket',
        'kategori',
        'total_pembayaran',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function konser()
    {
        return $this->belongsTo(DaftarKonser::class);
    }
}
