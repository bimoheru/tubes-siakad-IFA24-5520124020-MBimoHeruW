<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Seed the jadwal data.
     */
    public function run(): void
    {
        $jadwalData = [
            ['kode_matakuliah' => 'IF101001', 'nidn' => '0101017003', 'kelas' => '1.1', 'hari' => 'Senin', 'jam' => '2024-01-01 08:00:00', 'jam_selesai' => '2024-01-01 10:30:00'],
            ['kode_matakuliah' => 'IF101002', 'nidn' => '0101017004', 'kelas' => '1.2', 'hari' => 'Selasa', 'jam' => '2024-01-01 08:00:00', 'jam_selesai' => '2024-01-01 10:30:00'],
            ['kode_matakuliah' => 'IF101003', 'nidn' => '0101017001', 'kelas' => '1.2', 'hari' => 'Rabu', 'jam' => '2024-01-01 10:30:00', 'jam_selesai' => '2024-01-01 12:30:00'],
            ['kode_matakuliah' => 'IF101004', 'nidn' => '0101017002', 'kelas' => '1.2', 'hari' => 'Kamis', 'jam' => '2024-01-01 09:00:00', 'jam_selesai' => '2024-01-01 11:30:00'],
            ['kode_matakuliah' => 'IF101005', 'nidn' => '0101017008', 'kelas' => '1.3', 'hari' => 'Jumat', 'jam' => '2024-01-01 08:00:00', 'jam_selesai' => '2024-01-01 10:30:00'],
            ['kode_matakuliah' => 'IF101006', 'nidn' => '0101017007', 'kelas' => '2.2', 'hari' => 'Senin', 'jam' => '2024-01-01 09:00:00', 'jam_selesai' => '2024-01-01 11:30:00'],
            ['kode_matakuliah' => 'IF101007', 'nidn' => '0101017005', 'kelas' => '2.1', 'hari' => 'Rabu', 'jam' => '2024-01-01 09:00:00', 'jam_selesai' => '2024-01-01 10:30:00'],
            ['kode_matakuliah' => 'IF101008', 'nidn' => '0101017006', 'kelas' => '1.3', 'hari' => 'Selasa', 'jam' => '2024-01-01 10:30:00', 'jam_selesai' => '2024-01-01 12:30:00'],
        ];

        foreach ($jadwalData as $j) {
            Jadwal::create($j);
        }
    }
}
