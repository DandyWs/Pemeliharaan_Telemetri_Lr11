<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\JenisPeralatan;
use Illuminate\Database\Eloquent\Factories\Factory;

class JenisPeralatanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = JenisPeralatan::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'namaJenisAlat' => fake()->word(),
        ];
    }
}
