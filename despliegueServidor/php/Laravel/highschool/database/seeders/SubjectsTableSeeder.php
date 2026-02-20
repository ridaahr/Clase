<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;
use App\Models\Teacher;

class SubjectsTableSeeder extends Seeder
{
    public function run(): void
    {
        $teachers = Teacher::all();

        // Asignaturas asociadas a profesores
        Subject::create([
            'name' => 'Matemáticas',
            'duration' => 60,
            'teacher_id' => $teachers[0]->id, // Ana Pérez
        ]);

        Subject::create([
            'name' => 'Historia',
            'duration' => 45,
            'teacher_id' => $teachers[1]->id, // Luis García
        ]);

        // Asignaturas sin tests
        Subject::create([
            'name' => 'Filosofía',
            'duration' => 50,
            'teacher_id' => $teachers[0]->id, // Ana Pérez
        ]);

        Subject::create([
            'name' => 'Educación Física',
            'duration' => 40,
            'teacher_id' => $teachers[1]->id, // Luis García
        ]);
    }
}
