<?php

namespace App\Http\Controllers;

use App\Models\Band;
use App\Models\BandMember;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class BandController extends Controller
{
    public function index()
    {
        $band = Band::with('members')->first();

        return view('detail_concert', compact('band'));
    }
    public function Adminindex()
    {
        $bands = Band::with(['members', 'socialMedia'])->get();
        return view('admin.band', compact('bands'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'banner_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'members' => 'required|array',
            'members.*.name' => 'required|string|max:255',
            'members.*.role' => 'required|string|max:255', // Ganti position -> role
            'members.*.photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'instagram' => 'nullable|url|max:255',
        ]);

        // Simpan banner jika ada
        $bannerPath = $request->hasFile('banner_image')
            ? $request->file('banner_image')->store('images/banner_band', 'public')
            : null;

        // Simpan data band
        $band = Band::create([
            'name' => $request->name,
            'banner_image' => $bannerPath,
            'description' => $request->description,
        ]);

        // Simpan anggota band
        foreach ($request->members as $member) {
            $memberPhotoPath = isset($member['photo'])
                ? $member['photo']->store('images/members', 'public')
                : null;

            $band->members()->create([
                'name' => $member['name'],
                'role' => $member['role'], // Ganti position -> role
                'image' => $memberPhotoPath, // Ganti photo -> image
            ]);
        }

        // Simpan media sosial jika ada
        if ($request->instagram) {
            $band->socialMedia()->create([
                'platform' => 'Instagram',
                'url' => $request->instagram,
            ]);
        }

        return redirect()->route('admin.band.index')->with('success', 'Band berhasil ditambahkan!');
    }
}
