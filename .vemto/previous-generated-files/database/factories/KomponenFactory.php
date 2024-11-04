<?php

namespace Database\Factories;

use App\Models\Komponen;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class KomponenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Komponen::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'namaKomponen' => fake()->word(),
            'indikatorLED' => fake()->word(),
            'simCard' => fake()->word(),
            'kondisiAlat' => fake()->word(),
            'sambunganKabel' => fake()->word(),
            'perawatanSonde' => fake()->word(),
            'testDanSettingRTC' => fake()->word(),
            'levelAirAki' => fake()->randomNumber(),
            'teganganBateraiAki' => fake()->word(),
            'alat_telemetri_id' => \App\Models\AlatTelemetri::factory(),
        ];
    }
}
