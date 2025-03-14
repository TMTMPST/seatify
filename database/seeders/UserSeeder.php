<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder {
    public function run() {

        if (User::count() > 0) {
            // Users already exist, don't insert duplicates
            return;
        }

        DB::table('users')->insert([
            [
                'id' => 1,
                'email' => 'user@gmail.com',
                'password' => Hash::make('userganteng123'),
                'level' => 1,
                'created_at' => null,
                'updated_at' => null,
                'google_id' => null,
            ],
            [
                'id' => 2,
                'email' => 'admin@seatify.com',
                'password' => Hash::make('adminpassword123'),
                'level' => 0,
                'created_at' => null,
                'updated_at' => null,
                'google_id' => null,
            ],
            [
                'id' => 3,
                'email' => 'vidi@gmail.com',
                'password' => Hash::make('vidipassword123'),
                'level' => 1,
                'created_at' => '2025-03-09 00:28:24',
                'updated_at' => '2025-03-09 00:28:24',
                'google_id' => null,
            ]
        ]);
    }
}
