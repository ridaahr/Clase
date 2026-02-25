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
            'salary' => '1300',
            'email' => 'ana.perez@example.com',
            'active' => true,
        ]);

        Teacher::create([
            'name' => 'Luis García',
            'salary' => '110',
            'email' => 'luis.garcia@example.com',
            'active' => true,
        ]);

        // Profesores sin asignaturas
        Teacher::create([
            'name' => 'Marta López',
            'salary' => '1900',
            'email' => 'marta.lopez@example.com',
            'active' => false,
        ]);

        Teacher::create([
            'name' => 'Carlos Ruiz',
            'salary' => '500',
            'email' => 'carlos.ruiz@example.com',
            'active' => true,
        ]);
    }
}