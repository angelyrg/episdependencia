<?php

namespace Database\Seeders;

use App\Models\Paciente;
use App\Models\User;
use Database\Factories\PacienteFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "GILMER MATOS VILA",
            'username' => "admin",
            'password' => '$2y$10$79lFQuJfbngvyHBnNGszVeS1TDJq/RqgM2Y0wFvax/i113v2aBsAu', // admin
            'rol' => 'Responsable' ]);

    }
}
