<?php

namespace Tests\Feature;

use App\Models\DaftarKonser;
use App\Models\KategoriKonser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KategoriKonserTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_can_view_kategori_index()
    {
        $kategori = KategoriKonser::factory()->create();

        $response = $this->get(route('kategori.index'));

        $response->assertStatus(200);
        $response->assertSee($kategori->nama);
    }

    public function test_can_create_new_kategori()
    {
        $response = $this->post(route('kategori.store'), [
            'nama' => 'Test Kategori',
        ]);

        $response->assertRedirect(route('kategori.index'));
        
        $this->assertDatabaseHas('kategori_konser', [
            'nama' => 'Test Kategori',
        ]);
    }

    public function test_can_update_kategori()
    {
        $kategori = KategoriKonser::factory()->create();
        
        $response = $this->put(route('kategori.update', $kategori), [
            'nama' => 'Updated Kategori',
        ]);

        $response->assertRedirect(route('kategori.index'));
        
        $this->assertDatabaseHas('kategori_konser', [
            'id' => $kategori->id,
            'nama' => 'Updated Kategori',
        ]);
    }

    public function test_cannot_delete_kategori_with_related_konser()
    {
        $kategori = KategoriKonser::factory()->create();
        $konser = DaftarKonser::factory()->create(['kategori_id' => $kategori->id]);
        
        $response = $this->delete(route('kategori.destroy', $kategori));

        $response->assertRedirect(route('kategori.index'));
        $response->assertSessionHas('error');
        
        $this->assertDatabaseHas('kategori_konser', [
            'id' => $kategori->id,
        ]);
    }

    public function test_can_delete_kategori_without_related_konser()
    {
        $kategori = KategoriKonser::factory()->create();
        
        $response = $this->delete(route('kategori.destroy', $kategori));

        $response->assertRedirect(route('kategori.index'));
        
        $this->assertDatabaseMissing('kategori_konser', [
            'id' => $kategori->id,
        ]);
    }
}