<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Band;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BandTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_band_can_be_created()
    {
        $band = Band::create([
            'name' => 'The Rockers',
            'description' => 'A legendary rock band.',
            'banner_image' => 'rockers.jpg',
        ]);

        $this->assertDatabaseHas('bands', ['name' => 'The Rockers']);
    }

    /** @test */
    public function a_band_can_be_updated()
    {
        $band = Band::create([
            'name' => 'The Rockers',
            'description' => 'A legendary rock band.',
            'banner_image' => 'rockers.jpg',
        ]);

        $band->update(['name' => 'The New Rockers']);

        $this->assertDatabaseHas('bands', ['name' => 'The New Rockers']);
    }

    /** @test */
    public function a_band_can_be_deleted()
    {
        $band = Band::create([
            'name' => 'The Rockers',
            'description' => 'A legendary rock band.',
            'banner_image' => 'rockers.jpg',
        ]);

        $band->delete();

        $this->assertDatabaseMissing('bands', ['name' => 'The Rockers']);
    }
}
