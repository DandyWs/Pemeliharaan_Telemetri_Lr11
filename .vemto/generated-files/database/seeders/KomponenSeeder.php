<?php

namespace Database\Seeders;

use App\Models\Komponen;
use Illuminate\Database\Seeder;

class KomponenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Komponen::factory()
            ->count(5)
            ->create();
    }
}
