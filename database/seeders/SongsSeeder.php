<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SongsSeeder extends Seeder
{
    public function run()
    {
        DB::table('songs')->insert([
            [
                'band_id' => 1,
                'title' => 'Virus',
                'spotify_url' => 'https://open.spotify.com/embed/track/6CwdjQ5TcHvLkcmiqy1I73',
                'created_at' => '2025-03-08 18:34:04',
                'updated_at' => '2025-03-08 18:34:04',
            ],
            [
                'band_id' => 1,
                'title' => 'Terlalu Manis',
                'spotify_url' => 'https://open.spotify.com/embed/track/2MWsWUfa7NDZ4wBChRc4St',
                'created_at' => '2025-03-08 18:34:04',
                'updated_at' => '2025-03-08 18:34:04',
            ],
        ]);
    }
}
