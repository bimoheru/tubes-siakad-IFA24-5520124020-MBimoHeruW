<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            DosenSeeder::class,
            MataKuliahSeeder::class,
            JadwalSeeder::class,
            MahasiswaSeeder::class,
            KrsSeeder::class,
        ]);
    }
}
