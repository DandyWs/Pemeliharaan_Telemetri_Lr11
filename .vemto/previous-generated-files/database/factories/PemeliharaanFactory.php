<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Pemeliharaan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PemeliharaanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pemeliharaan::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tanggalPemeliharaan' => fake()->word(),
            'waktuMulaiPemeliharaan' => fake()->word(),
            'periodePemeliharaan' => fake()->word(),
            'cuaca' => fake()->word(),
            'no_alatUkur' => fake()->word(),
            'no_GSM' => fake()->word(),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
