<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DosenSeeder extends Seeder
{
    /**
     * Seed the dosen data.
     */
    public function run(): void
    {
        $dosenUsers = [
            ['name' => 'Lalan Jaelani, S.T, M.Kom', 'email' => 'lalan@unsur.ac.id'], //7001
            ['name' => 'Tarmin Abdul Ghani, S.T, M.T', 'email' => 'tag@unsur.ac.id'], //7002
            ['name' => 'Siti Nazilah, ST., M.Kom', 'email' => 'sitinaz@unsur.ac.id'], //7003
            ['name' => 'Hasbu Naim S., S.Kom, M.kom', 'email' => 'hasbunaim@unsur.ac.id'], //7004
            ['name' => 'Sutono, S.Si, M.Kom', 'email' => 'sutono@unsur.ac.id'], //7005
            ['name' => 'Siti Sarah A., ST., MT.', 'email' => 'sitisar@unsur.ac.id'], //7006
            ['name' => 'Fuad Nasher, ST., M.Kom', 'email' => 'fuadn@unsur.ac.id'], //7007
            ['name' => 'AI Musrifah, ST., M.Kom', 'email' => 'aimusrifah@unsur.ac.id'], //7008
        ];

        $dosenNIDN = ['0101017001', '0101017002', '0101017003', '0101017004', '0101017005', '0101017006', '0101017007', '0101017008'];

        foreach ($dosenUsers as $i => $du) {
            $user = User::create([
                'name' => $du['name'],
                'email' => $du['email'],
                'password' => Hash::make('123'),
                'role' => 'admin',
            ]);

            Dosen::create([
                'nidn' => $dosenNIDN[$i],
                'nama' => $du['name'],
                'user_id' => $user->id,
            ]);
        }
    }
}
