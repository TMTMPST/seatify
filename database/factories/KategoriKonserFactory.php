<?php

namespace Database\Factories;

use App\Models\KategoriKonser;
use Illuminate\Database\Eloquent\Factories\Factory;

class KategoriKonserFactory extends Factory
{
    protected $model = KategoriKonser::class;

    public function definition()
    {
        return [
            'nama' => $this->faker->word,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}