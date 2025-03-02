<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KategoriKonser;
use App\Models\DaftarKonser;

class DaftarKonserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $konser = [
            [
                'judul' => 'Konser Slank di Indonesia 2024', 
                'deskripsi' => 'Jangan lewatkan penampilan energik Slank dengan lagu-lagu hits yang akan menggetarkan panggung!', 
                'gambar' => 'jazz.jpg', 
                'kategori' => 'Rock', 
                'ketersediaan_tiket' => 'tersedia'
            ],
            [
                'judul' => 'Konser Dewa 19 2025', 
                'deskripsi' => 'Rasakan nostalgia dengan penampilan epik Dewa 19 yang akan mengguncang panggung dengan lagu-lagu legendaris!', 
                'gambar' => 'pop.jpg', 
                'kategori' => 'Rock', 
                'ketersediaan_tiket' => 'tidak tersedia'
            ],
            [
                'judul' => 'Konser Noah di Indonesia 2024', 
                'deskripsi' => 'Saksikan penampilan Noah yang memukau dengan aransemen baru dan suasana konser yang luar biasa!', 
                'gambar' => 'rock.jpg', 
                'kategori' => 'Rock', 
                'ketersediaan_tiket' => 'tidak tersedia'
            ],
            [
                'judul' => 'Konser Superman Is Dead di Indonesia 2024', 
                'deskripsi' => 'Rasakan vibe punk rock khas Superman Is Dead yang siap membakar semangat para penggemar!', 
                'gambar' => 'jazz.jpg', 
                'kategori' => 'Rock', 
                'ketersediaan_tiket' => 'tidak tersedia'
            ],
            [
                'judul' => 'Konser Burgerkill di Indonesia 2024', 
                'deskripsi' => 'Siap headbanging? Burgerkill akan membawa suasana panggung menjadi lebih liar', 
                'gambar' => 'pop.jpg', 
                'kategori' => 'Rock', 
                'ketersediaan_tiket' => 'tidak tersedia'
            ],
            [
                'judul' => 'Konser Tiara Andini 2024', 
                'deskripsi' => 'Nikmati suara merdu Tiara Andini yang akan membawakan lagu-lagu hits dengan penuh emosi dan harmoni.', 
                'gambar' => 'rock.jpg', 
                'kategori' => 'Pop', 
                'ketersediaan_tiket' => 'tidak tersedia'
            ],
            [
                'judul' => 'Konser Rizky Febian 2025', 
                'deskripsi' => 'Dengarkan suara khas Rizky Febian yang akan menyanyikan lagu-lagu romantis favoritmu dengan suasana yang intim.', 
                'gambar' => 'jazz.jpg', 
                'kategori' => 'Pop', 
                'ketersediaan_tiket' => 'tidak tersedia'
            ],
            [
                'judul' => 'Konser Mahalini 2024', 
                'deskripsi' => 'Mahalini siap menghipnotis penggemar dengan lagu-lagu ballad yang penuh makna dan aransemen memukau.', 
                'gambar' => 'pop.jpg', 
                'kategori' => 'Pop', 
                'ketersediaan_tiket' => 'tidak tersedia'
            ],
            [
                'judul' => 'Konser Arsy Widianto 2024', 
                'deskripsi' => 'Dengarkan lantunan romantis Arsy Widianto yang akan menghangatkan suasana malam konsermu.', 
                'gambar' => 'rock.jpg', 
                'kategori' => 'Pop', 
                'ketersediaan_tiket' => 'tidak tersedia'
            ],
            [
                'judul' => 'Konser Lyodra 2024', 
                'deskripsi' => 'Suara emas Lyodra akan memanjakan telingamu dengan penampilan live yang penuh penghayatan.', 
                'gambar' => 'rock.jpg', 
                'kategori' => 'Pop', 
                'ketersediaan_tiket' => 'tidak tersedia'
            ],
            [
                'judul' => 'Konser Maliq & DEssentials 2024', 
                'deskripsi' => 'Nikmati penampilan energik Maliq & DEssentials yang siap menghadirkan nuansa jazz penuh warna dengan aransemen khas mereka.', 
                'gambar' => 'rock.jpg', 
                'kategori' => 'Jazz', 
                'ketersediaan_tiket' => 'tidak tersedia'
            ],
            [
                'judul' => 'Konser Benny Likumahuwa', 
                'deskripsi' => 'Saksikan Benny Likumahuwa Jazz Connection yang akan membawa perjalanan musik jazz klasik dengan sentuhan modern.', 
                'gambar' => 'rock.jpg', 
                'kategori' => 'Jazz', 
                'ketersediaan_tiket' => 'tidak tersedia'
            ],
            [
                'judul' => 'Konser Tulus Jazz Night 2024', 
                'deskripsi' => 'Rasakan kehangatan suara Tulus yang berpadu dengan iringan jazz yang memanjakan telinga di malam yang penuh harmoni.', 
                'gambar' => 'rock.jpg', 
                'kategori' => 'Jazz', 
                'ketersediaan_tiket' => 'tidak tersedia'
            ],
        ];

        foreach ($konser as $k) {
            $kategori = KategoriKonser::where('nama', $k['kategori'])->first();

            DaftarKonser::create([
                'kategori_id' => $kategori->id,
                'judul' => $k['judul'],
                'deskripsi' => $k['deskripsi'],
                'gambar' => $k['gambar'],
                'ketersediaan_tiket' => $k['ketersediaan_tiket'],
            ]);
        }
    }
}
