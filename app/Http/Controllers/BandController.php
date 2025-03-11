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
}
