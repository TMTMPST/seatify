<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialMediaSeeder extends Seeder
{
    public function run()
    {
        DB::table('social_media')->insert([
            [
                'band_id' => 1,
                'platform' => 'Instagram',
                'url' => 'https://www.instagram.com/slankdotcom',
                'created_at' => '2025-03-08 18:34:04',
                'updated_at' => '2025-03-08 18:34:04',
            ],
        ]);
    }
}
