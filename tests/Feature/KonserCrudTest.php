<?php

namespace Tests\Feature;

use App\Models\DaftarKonser;
use App\Models\KategoriKonser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class KonserCrudTest extends TestCase
{
    use RefreshDatabase;

    // KATEGORI KONSER TESTS
    public function test_can_create_kategori()
    {
        $kategori = KategoriKonser::create([
            'nama' => 'Pop Music'
        ]);

        $this->assertDatabaseHas('kategori_konser', [
            'nama' => 'Pop Music',
        ]);
    }

    public function test_can_read_kategori()
    {
        $kategori = KategoriKonser::create([
            'nama' => 'Rock Music'
        ]);

        $found = KategoriKonser::find($kategori->id);
        
        $this->assertEquals('Rock Music', $found->nama);
    }

    public function test_can_update_kategori()
    {
        $kategori = KategoriKonser::create([
            'nama' => 'Jazz Music'
        ]);

        $kategori->update([
            'nama' => 'Jazz & Blues'
        ]);

        $this->assertDatabaseHas('kategori_konser', [
            'id' => $kategori->id,
            'nama' => 'Jazz & Blues'
        ]);
    }

    public function test_can_delete_kategori()
    {
        $kategori = KategoriKonser::create([
            'nama' => 'Classical Music'
        ]);

        $kategoriId = $kategori->id;
        $kategori->delete();

        $this->assertDatabaseMissing('kategori_konser', [
            'id' => $kategoriId
        ]);
    }

    // DAFTAR KONSER TESTS
    public function test_can_create_konser()
    {
        $kategori = KategoriKonser::create([
            'nama' => 'Festival'
        ]);

        $konser = DaftarKonser::create([
            'kategori_id' => $kategori->id,
            'gambar' => 'festival.jpg',
            'judul' => 'Summer Festival 2025',
            'deskripsi' => 'A summer music festival with top artists',
            'ketersediaan_tiket' => 'tersedia'
        ]);

        $this->assertDatabaseHas('daftar_konser', [
            'judul' => 'Summer Festival 2025',
            'ketersediaan_tiket' => 'tersedia'
        ]);
    }

    public function test_can_read_konser()
    {
        $kategori = KategoriKonser::create([
            'nama' => 'Opera'
        ]);

        $konser = DaftarKonser::create([
            'kategori_id' => $kategori->id,
            'gambar' => 'opera.jpg',
            'judul' => 'La Traviata',
            'deskripsi' => 'Famous opera by Giuseppe Verdi',
            'ketersediaan_tiket' => 'tersedia'
        ]);

        $found = DaftarKonser::with('kategori')->find($konser->id);
        
        $this->assertEquals('La Traviata', $found->judul);
        $this->assertEquals('Opera', $found->kategori->nama);
    }

    public function test_can_update_konser()
    {
        $kategori = KategoriKonser::create([
            'nama' => 'Symphony'
        ]);

        $konser = DaftarKonser::create([
            'kategori_id' => $kategori->id,
            'gambar' => 'symphony.jpg',
            'judul' => 'Beethoven Symphony No. 5',
            'deskripsi' => 'Classical symphony by Ludwig van Beethoven',
            'ketersediaan_tiket' => 'tersedia'
        ]);

        $konser->update([
            'judul' => 'Beethoven Symphony No. 9',
            'deskripsi' => 'Beethoven\'s famous Choral Symphony',
            'ketersediaan_tiket' => 'tidak tersedia'
        ]);

        $this->assertDatabaseHas('daftar_konser', [
            'id' => $konser->id,
            'judul' => 'Beethoven Symphony No. 9',
            'ketersediaan_tiket' => 'tidak tersedia'
        ]);
    }

    public function test_can_delete_konser()
    {
        $kategori = KategoriKonser::create([
            'nama' => 'Jazz'
        ]);

        $konser = DaftarKonser::create([
            'kategori_id' => $kategori->id,
            'gambar' => 'jazz.jpg',
            'judul' => 'Jazz Night',
            'deskripsi' => 'A night of smooth jazz',
            'ketersediaan_tiket' => 'tersedia'
        ]);

        $konserId = $konser->id;
        $konser->delete();

        $this->assertDatabaseMissing('daftar_konser', [
            'id' => $konserId
        ]);
    }

    public function test_kategori_relationship()
    {
        $kategori = KategoriKonser::create([
            'nama' => 'EDM'
        ]);

        $konser1 = DaftarKonser::create([
            'kategori_id' => $kategori->id,
            'gambar' => 'edm1.jpg',
            'judul' => 'Tomorrowland',
            'deskripsi' => 'The biggest EDM festival',
            'ketersediaan_tiket' => 'tersedia'
        ]);

        $konser2 = DaftarKonser::create([
            'kategori_id' => $kategori->id,
            'gambar' => 'edm2.jpg',
            'judul' => 'Ultra Music Festival',
            'deskripsi' => 'Popular EDM event',
            'ketersediaan_tiket' => 'tersedia'
        ]);

        // Test relationship from kategori to konser
        $this->assertEquals(2, $kategori->konser->count());
        $this->assertEquals('Tomorrowland', $kategori->konser->first()->judul);

        // Test relationship from konser to kategori
        $this->assertEquals('EDM', $konser1->kategori->nama);
    }
}