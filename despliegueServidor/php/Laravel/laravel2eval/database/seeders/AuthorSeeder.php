<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('authors')->insert([
            [
                'id' => 1,
                'name' => 'Ana López',
                'email' => 'ana@example.com',
                'age' => 28,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Bruno García',
                'email' => 'bruno@example.com',
                'age' => 35,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Carla Pérez',
                'email' => 'carla@example.com',
                'age' => 22,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}