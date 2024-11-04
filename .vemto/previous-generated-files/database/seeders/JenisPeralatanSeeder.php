<?php

namespace Database\Seeders;

use App\Models\JenisPeralatan;
use Illuminate\Database\Seeder;

class JenisPeralatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JenisPeralatan::factory()
            ->count(5)
            ->create();
    }
}
