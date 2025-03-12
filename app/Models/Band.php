<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'banner_image'];

    public function members()
    {
        return $this->hasMany(BandMember::class, 'band_id');
    }

    public function songs()
    {
        return $this->hasMany(Song::class);
    }

    public function socialMedia()
    {
        return $this->hasMany(SocialMedia::class, 'band_id');
    }
    public function konser()
    {
        return $this->hasMany(DaftarKonser::class, 'band_id');
    }
}