<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Band;
use App\Models\BandMember;
use App\Models\Song;
use App\Models\SocialMedia;

class BandSeeder extends Seeder
{
    public function run()
    {
        $band = Band::create([
            'name' => 'Slank',
            'description' => 'Slank adalah band rock Indonesia yang berdiri sejak tahun 1983...',
            'banner_image' => 'https://asset.kompas.com/crops/j1ffU8AGsX0ErfVbDQNJ1VfbKm4=/0x0:830x553/1200x800/data/photo/2022/01/19/61e7bd87982b5.jpg'
        ]);

        $members = [
            ['name' => 'Kaka', 'role' => 'Vokal', 'image' => 'https://slank.com/wp-content/uploads/2013/03/KAKA.jpg'],
            ['name' => 'Bimbim', 'role' => 'Drum', 'image' => 'https://slank.com/wp-content/uploads/2013/03/BIMBIM.jpg'],
            ['name' => 'Ridho', 'role' => 'Gitar', 'image' => 'https://slank.com/wp-content/uploads/2013/03/RIDHO.jpg'],
            ['name' => 'Ivanka', 'role' => 'Bass', 'image' => 'https://slank.com/wp-content/uploads/2013/03/IVANKA.jpg'],
        ];
        foreach ($members as $member) {
            $band->members()->create($member);
        }

        $songs = [
            ['title' => 'Virus', 'spotify_url' => 'https://open.spotify.com/embed/track/6CwdjQ5TcHvLkcmiqy1I73'],
            ['title' => 'Terlalu Manis', 'spotify_url' => 'https://open.spotify.com/embed/track/2MWsWUfa7NDZ4wBChRc4St'],
        ];
        foreach ($songs as $song) {
            $band->songs()->create($song);
        }

        $socials = [
            ['platform' => 'Instagram', 'url' => 'https://www.instagram.com/slankdotcom'],
        ];
        foreach ($socials as $social) {
            $band->socialMedia()->create($social);
        }
    }
}

