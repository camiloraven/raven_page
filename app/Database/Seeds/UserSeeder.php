<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'email'    => 'fg@raven.com',
            'password' => password_hash('w3Oxxe8oHLOVFeZUb8DbA0kiG0OiNsKY9R', PASSWORD_DEFAULT), // TU CONTRASEÑA
        ];
        // Usamos query builder simple
        $this->db->table('users')->insert($data);
    }
}

