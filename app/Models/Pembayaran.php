<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\DaftarKonser;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'konser_id',
        'order_id',
        'total_pembayaran',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function konser()
    {
        return $this->belongsTo(DaftarKonser::class, 'konser_id');
    }
}
