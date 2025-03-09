<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BandMember extends Model
{
    use HasFactory;
    protected $fillable = ['band_id', 'name', 'role', 'image'];

    public function band()
    {
        return $this->belongsTo(Band::class);
    }
}

