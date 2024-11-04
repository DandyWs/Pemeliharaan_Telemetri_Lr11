<?php

namespace Database\Seeders;

use App\Models\Pemeliharaan;
use Illuminate\Database\Seeder;

class PemeliharaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pemeliharaan::factory()
            ->count(5)
            ->create();
    }
}
