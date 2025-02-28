<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder {
    public function run() {
        DB::table('users')->insert([
            'email' => 'admin@seatify.com',
            'password' => Hash::make('adminganteng'),
            'level' => 0,
        ]);
    }
}
