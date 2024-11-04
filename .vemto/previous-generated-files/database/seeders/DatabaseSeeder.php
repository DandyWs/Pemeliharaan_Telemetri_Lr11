<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
            ]);

        $this->call(PemeliharaanSeeder::class);
        $this->call(PemeriksaanSeeder::class);
        $this->call(JenisPeralatanSeeder::class);
        $this->call(AlatTelemetriSeeder::class);
        $this->call(KomponenSeeder::class);
        $this->call(SettingSeeder::class);
    }
}
