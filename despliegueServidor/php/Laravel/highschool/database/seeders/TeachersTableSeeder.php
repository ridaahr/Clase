<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Teacher;

class TeachersTableSeeder extends Seeder
{
    public function run(): void
    {
        // Profesores con asignaturas
        Teacher::create([
            'name' => 'Ana Pérez',
            'email' => 'ana.perez@example.com',
            'active' => true,
        ]);

        Teacher::create([
            'name' => 'Luis García',
            'email' => 'luis.garcia@example.com',
            'active' => true,
        ]);

        // Profesores sin asignaturas
        Teacher::create([
            'name' => 'Marta López',
            'email' => 'marta.lopez@example.com',
            'active' => false,
        ]);

        Teacher::create([
            'name' => 'Carlos Ruiz',
            'email' => 'carlos.ruiz@example.com',
            'active' => true,
        ]);
    }
}