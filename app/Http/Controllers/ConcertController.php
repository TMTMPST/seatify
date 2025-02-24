<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConcertController extends Controller
{
    public function index()
    {
        $concerts = json_decode(file_get_contents(public_path('data/concerts.json')), true);
        return view('concerts.index', compact('concerts'));
    }
}
