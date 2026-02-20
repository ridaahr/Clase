<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Test;
use App\Models\Subject;

class TestsTableSeeder extends Seeder
{
    public function run(): void
    {
        $subjects = Subject::all();

        // Tests asociados a algunas asignaturas
        Test::create([
            'name' => 'Examen Matemáticas 1',
            'numberQuestions' => 10,
            'type' => '1',
            'subject_id' => $subjects[0]->id, // Matemáticas
        ]);

        Test::create([
            'name' => 'Examen Historia 1',
            'numberQuestions' => 8,
            'type' => '2',
            'subject_id' => $subjects[1]->id, // Historia
        ]);

        Test::create([
            'name' => 'Examen Matemáticas 2',
            'numberQuestions' => 12,
            'type' => '3',
            'subject_id' => $subjects[0]->id, // Matemáticas
        ]);

        // Sin test para Filosofía y Educación Física
    }
}