<?php

namespace Tests\Feature;

use App\Models\DaftarKonser;
use App\Models\KategoriKonser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class DaftarKonserTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_can_view_konser_index()
    {
        // Create some test data
        $kategori = KategoriKonser::factory()->create();
        $konser = DaftarKonser::factory()->create(['kategori_id' => $kategori->id]);

        $response = $this->get(route('konser.index'));

        $response->assertStatus(200);
        $response->assertSee($konser->judul);
    }

    public function test_can_create_new_konser()
    {
        Storage::fake('public');

        $kategori = KategoriKonser::factory()->create();
        
        $response = $this->post(route('konser.store'), [
            'kategori_id' => $kategori->id,
            'judul' => 'Test Konser',
            'deskripsi' => 'Deskripsi test konser',
            'ketersediaan_tiket' => 'tersedia',
            'gambar' => UploadedFile::fake()->image('konser.jpg'),
        ]);

        $response->assertRedirect(route('konser.index'));
        
        $this->assertDatabaseHas('daftar_konser', [
            'judul' => 'Test Konser',
            'deskripsi' => 'Deskripsi test konser',
        ]);
        
        $konser = DaftarKonser::where('judul', 'Test Konser')->first();
        Storage::disk('public')->assertExists($konser->gambar);
    }

    public function test_can_update_konser()
    {
        Storage::fake('public');

        $kategori = KategoriKonser::factory()->create();
        $konser = DaftarKonser::factory()->create([
            'kategori_id' => $kategori->id,
            'gambar' => 'old-image.jpg'
        ]);
        
        $response = $this->put(route('konser.update', $konser), [
            'kategori_id' => $kategori->id,
            'judul' => 'Updated Konser',
            'deskripsi' => 'Updated deskripsi',
            'ketersediaan_tiket' => 'tidak tersedia',
            'gambar' => UploadedFile::fake()->image('new-konser.jpg'),
        ]);

        $response->assertRedirect(route('konser.index'));
        
        $this->assertDatabaseHas('daftar_konser', [
            'id' => $konser->id,
            'judul' => 'Updated Konser',
            'deskripsi' => 'Updated deskripsi',
            'ketersediaan_tiket' => 'tidak tersedia',
        ]);
    }

    public function test_can_delete_konser()
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->image('konser.jpg');
        $path = Storage::disk('public')->put('konser', $file);

        $kategori = KategoriKonser::factory()->create();
        $konser = DaftarKonser::factory()->create([
            'kategori_id' => $kategori->id,
            'gambar' => $path
        ]);
        
        $response = $this->delete(route('konser.destroy', $konser));

        $response->assertRedirect(route('konser.index'));
        
        $this->assertDatabaseMissing('daftar_konser', [
            'id' => $konser->id,
        ]);
        
        Storage::disk('public')->assertMissing($path);
    }
}