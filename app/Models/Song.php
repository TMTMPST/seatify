<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    protected $fillable = ['band_id', 'title', 'spotify_url'];

    public function band()
    {
        return $this->belongsTo(Band::class);
    }
}

