<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Coba login
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            // Redirect berdasarkan level
            return $user->level == 0 ? redirect('/admin') : redirect('/');
        }

        // Jika gagal
        return back()->with('error', 'Email atau password salah.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Anda telah logout.');
    }
}
