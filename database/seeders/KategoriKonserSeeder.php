<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KategoriKonser;

class KategoriKonserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = ['Jazz', 'Pop', 'Rock'];

        foreach ($kategori as $k) {
            KategoriKonser::create(['nama' => $k]);
        }
    }
}
