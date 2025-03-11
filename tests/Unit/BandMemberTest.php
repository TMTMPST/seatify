<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Band;
use App\Models\BandMember;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test; // Add this for PHPUnit 12+

class BandMemberTest extends TestCase
{
    use RefreshDatabase;

    #[Test] 
    public function a_band_member_can_be_created()
    {
        $band = Band::create([
            'name' => 'The Rockers',
            'description' => 'A legendary rock band.',
            'banner_image' => 'rockers.jpg',
        ]);

        $member = BandMember::create([
            'band_id' => $band->id,
            'name' => 'John Doe',
            'role' => 'Guitarist',
            'image' => 'john_doe.jpg',
        ]);

        $this->assertDatabaseHas('band_members', ['name' => 'John Doe']);
    }

    #[Test] 
    public function a_band_member_can_be_updated()
    {
        $band = Band::create([
            'name' => 'The Rockers',
            'description' => 'A legendary rock band.',
            'banner_image' => 'rockers.jpg',
        ]);

        $member = BandMember::create([
            'band_id' => $band->id,
            'name' => 'John Doe',
            'role' => 'Guitarist',
            'image' => 'john_doe.jpg',
        ]);

        $member->update(['name' => 'Johnny Doe']);

        $this->assertDatabaseHas('band_members', ['name' => 'Johnny Doe']);
    }

    #[Test] 
    public function a_band_member_can_be_deleted()
    {
        $band = Band::create([
            'name' => 'The Rockers',
            'description' => 'A legendary rock band.',
            'banner_image' => 'rockers.jpg',
        ]);

        $member = BandMember::create([
            'band_id' => $band->id,
            'name' => 'John Doe',
            'role' => 'Guitarist',
            'image' => 'john_doe.jpg',
        ]);

        $member->delete();

        $this->assertDatabaseMissing('band_members', ['name' => 'John Doe']);
    }

    #[Test] 
    public function deleting_a_band_deletes_its_members()
    {
        $band = Band::create([
            'name' => 'The Rockers',
            'description' => 'A legendary rock band.',
            'banner_image' => 'rockers.jpg',
        ]);

        $member = BandMember::create([
            'band_id' => $band->id,
            'name' => 'John Doe',
            'role' => 'Guitarist',
            'image' => 'john_doe.jpg',
        ]);

        $band->delete();

        $this->assertDatabaseMissing('bands', ['id' => $band->id]);
        $this->assertDatabaseMissing('band_members', ['id' => $member->id]);
    }
}
