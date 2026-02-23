<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('comments')->insert([
            [
                'content' => 'Comentario 1 para Post 1',
                'post_id' => 1, // Post con comments
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'content' => 'Comentario 2 para Post 1',
                'post_id' => 1, // Post con comments
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'content' => 'Comentario 1 para Post 3',
                'post_id' => 3, // Post con comments
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'content' => 'Comentario 2 para Post 3',
                'post_id' => 3, // Post con comments
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}