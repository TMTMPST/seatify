<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BandMembersSeeder extends Seeder
{
    public function run()
    {
        DB::table('band_members')->insert([
            [
                'band_id' => 1,
                'name' => 'Kaka',
                'role' => 'Vokal',
                'image' => 'https://slank.com/wp-content/uploads/2013/03/KAKA.jpg',
                'created_at' => '2025-03-08 18:34:04',
                'updated_at' => '2025-03-08 18:34:04',
            ],
            [
                'band_id' => 1,
                'name' => 'Bimbim',
                'role' => 'Drum',
                'image' => 'https://slank.com/wp-content/uploads/2013/03/BIMBIM.jpg',
                'created_at' => '2025-03-08 18:34:04',
                'updated_at' => '2025-03-08 18:34:04',
            ],
            [
                'band_id' => 1,
                'name' => 'Ridho',
                'role' => 'Gitar',
                'image' => 'https://slank.com/wp-content/uploads/2013/03/RIDHO.jpg',
                'created_at' => '2025-03-08 18:34:04',
                'updated_at' => '2025-03-08 18:34:04',
            ],
            [
                'band_id' => 1,
                'name' => 'Ivanka',
                'role' => 'Bass',
                'image' => 'https://slank.com/wp-content/uploads/2013/03/IVANKA.jpg',
                'created_at' => '2025-03-08 18:34:04',
                'updated_at' => '2025-03-08 18:34:04',
            ],
        ]);
    }
}
