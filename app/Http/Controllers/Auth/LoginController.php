<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validated = $this->validateLoginRequest($request);

        if (!User::where('email', $validated['email'])->exists()) {
            return back()->withErrors(['email' => 'Email tidak terdaftar.'])->withInput();
        }

        // Coba login
        if (!Auth::attempt($validated)) {
            return back()->withErrors(['password' => 'Kata sandi salah.'])->withInput();
        }

        return redirect()->intended('/admin');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Anda telah logout.');
    }

    private function validateLoginRequest(Request $request)
    {
        return $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi harus minimal 8 karakter.',
        ]);
    }
}
