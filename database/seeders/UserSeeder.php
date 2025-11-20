<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Asegúrate de importar el modelo User

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'), // Cambia la contraseña según lo desees
            'role' => 'admin', // Asegúrate de que el rol sea 'admin'
        ]);

        User::create([
            'name' => 'Chofer User',
            'email' => 'chofer@example.com',
            'password' => bcrypt('password'),
            'role' => 'chofer',
        ]);

        User::create([
            'name' => 'Dpto User',
            'email' => 'dpto@example.com',
            'password' => bcrypt('password'),
            'role' => 'dpto',
        ]);
    }
}
