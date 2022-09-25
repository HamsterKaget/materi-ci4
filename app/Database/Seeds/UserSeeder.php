<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Administrator',
                'email' => 'admin@example.com',
                'nis' => '',
                'password' => password_hash('admin123', PASSWORD_BCRYPT),
                'role' => 'admin',

            ], 
            [
                'name' => 'Andi Saputra',
                'email' => 'andi@example.com',
                'nis' => '121',
                'password' => password_hash('admin123', PASSWORD_BCRYPT),
                'role' => 'siswa',
            ]
        ];

        $this->db->table('users')->insertBatch($data);

    }
}
