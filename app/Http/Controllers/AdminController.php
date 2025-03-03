<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->select('id', 'email', 'level')->get();
        return view('admin.users', compact('users'));
    }
}
