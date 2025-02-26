<?php

namespace Database\Factories;

use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Setting::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'namaSetting' => fake()->word(),
            'nilaiSebelumKalibrasi' => fake()->word(),
            'nilaiSesudahKalibrasi' => fake()->word(),
            'displaySebelumKalibrasi' => fake()->word(),
            'displaySesudahKalibrasi' => fake()->word(),
            'alat_telemetri_id' => \App\Models\AlatTelemetri::factory(),
        ];
    }
}
