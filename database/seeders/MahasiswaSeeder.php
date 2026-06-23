<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MahasiswaSeeder extends Seeder
{
    /**
     * Seed the mahasiswa data.
     */
    public function run(): void
    {
        $mahasiswaData = [
            ['npm' => '2021001001', 'nidn' => '0101017001', 'nama' => 'Rifa Maulana Aziz',     'email' => 'rifa@unsur.ac.id'],
            ['npm' => '2021001002', 'nidn' => '0101017008', 'nama' => 'Muhammad Bimo Heru Wahyono',     'email' => 'bimo@unsur.ac.id'],
            ['npm' => '2021001003', 'nidn' => '0101017008', 'nama' => 'Robi Septiandi',    'email' => 'rose@unsur.ac.id'],
            ['npm' => '2021001004', 'nidn' => '0101017008', 'nama' => 'Muggy Soewarman',      'email' => 'muggy@unsur.ac.id'],
        ];

        foreach ($mahasiswaData as $mhs) {
            $user = User::create([
                'name'     => $mhs['nama'],
                'email'    => $mhs['email'],
                'password' => Hash::make('123'),
                'role'     => 'mahasiswa',
            ]);

            Mahasiswa::create([
                'npm'     => $mhs['npm'],
                'nidn'    => $mhs['nidn'],
                'nama'    => $mhs['nama'],
                'user_id' => $user->id,
            ]);
        }
    }
}
