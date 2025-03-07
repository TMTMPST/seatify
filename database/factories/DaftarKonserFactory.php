<?php

namespace Database\Factories;

use App\Models\DaftarKonser;
use App\Models\KategoriKonser;
use Illuminate\Database\Eloquent\Factories\Factory;

class DaftarKonserFactory extends Factory
{
    protected $model = DaftarKonser::class;

    public function definition()
    {
        return [
            'kategori_id' => KategoriKonser::factory(),
            'gambar' => 'konser/' . $this->faker->image('public/storage/konser', 400, 300, null, false),
            'judul' => $this->faker->sentence,
            'deskripsi' => $this->faker->paragraph,
            'ketersediaan_tiket' => $this->faker->randomElement(['tersedia', 'tidak tersedia']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}