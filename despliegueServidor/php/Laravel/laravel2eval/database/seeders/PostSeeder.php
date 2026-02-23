<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'id' => 1,
                'title' => 'Post 1 de Ana',
                'content' => 'Contenido del post 1.',
                'author_id' => 1, // Ana (tendrá posts)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'title' => 'Post 2 de Ana',
                'content' => 'Contenido del post 2.',
                'author_id' => 1, // Ana
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'title' => 'Post 1 de Bruno',
                'content' => 'Contenido del post 3.',
                'author_id' => 2, // Bruno (tendrá posts)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'title' => 'Post 2 de Bruno',
                'content' => 'Contenido del post 4.',
                'author_id' => 2, // Bruno
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}