<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;

    protected $fillable = ['band_id', 'platform', 'url'];

    public function band()
    {
        return $this->belongsTo(Band::class, 'band_id');
    }
}