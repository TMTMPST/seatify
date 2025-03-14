<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaftarKonserSeeder extends Seeder
{
    public function run()
    {
        DB::table('daftar_konser')->insert([
            [
                'kategori_id' => 3,
                'gambar' => 'images/konser/slank-konser.jpg',
                'judul' => 'Konser Slank di Indonesia 2024',
                'deskripsi' => 'Jangan lewatkan penampilan energik Slank dengan lagu-lagu hits yang akan menggetarkan panggung!',
                'ketersediaan_tiket' => 1,
                'band_id' => null,
                'created_at' => '2025-03-08 18:35:07',
                'updated_at' => '2025-03-08 18:35:07',
            ],
            [
                'kategori_id' => 3,
                'gambar' => 'images/konser/dewa-konser.jpg',
                'judul' => 'Konser Dewa 19 2025',
                'deskripsi' => 'Rasakan nostalgia dengan penampilan epik Dewa 19 yang akan mengguncang panggung dengan lagu-lagu legendaris!',
                'ketersediaan_tiket' => 0,
                'band_id' => null,
                'created_at' => '2025-03-08 18:35:07',
                'updated_at' => '2025-03-08 18:35:07',
            ],
            [
                'kategori_id' => 3,
                'gambar' => 'images/konser/noah-konser.jpeg',
                'judul' => 'Konser Noah di Indonesia 2024',
                'deskripsi' => 'Saksikan penampilan Noah yang memukau dengan aransemen baru dan suasana konser yang luar biasa!',
                'ketersediaan_tiket' => 0,
                'band_id' => null,
                'created_at' => '2025-03-08 18:35:07',
                'updated_at' => '2025-03-08 18:35:07',
            ],
            [
                'kategori_id' => 3,
                'gambar' => 'images/konser/sid-konser.jpeg',
                'judul' => 'Konser Superman Is Dead di Indonesia 2024',
                'deskripsi' => 'Rasakan vibe punk rock khas Superman Is Dead yang siap membakar semangat para penggemar!',
                'ketersediaan_tiket' => 0,
                'band_id' => null,
                'created_at' => '2025-03-08 18:35:07',
                'updated_at' => '2025-03-08 18:35:07',
            ],
        ]);
    }
}
