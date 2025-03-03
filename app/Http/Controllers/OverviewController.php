<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OverviewController extends Controller
{
    public function index()
    {
        return view('admin.overview', [
            'showKonser' => true,
            'showPengguna' => false,
            'showPendapatan' => false
        ]);
    }
}
