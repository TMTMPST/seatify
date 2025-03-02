<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    private const USER_DEFAULT_LEVEL = 1;

    public function register(Request $request)
    {
        $validator = $this->validateRequest($request);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $this->createUser($request);

        return back()->with('success', 'Registrasi berhasil!');
    }

    private function validateRequest(Request $request)
    {
        return Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);
    }

    private function createUser(Request $request): void
    {
        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => self::USER_DEFAULT_LEVEL,
        ]);
    }
}
