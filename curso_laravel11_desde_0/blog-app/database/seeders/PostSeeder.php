<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $post = new Post();

        $post->title = 'Post 1';
        $post->content = 'Contenido 1';
        $post->category = 'Categoría 1';
        $post->published_at = now();

        $post->save();


        $post = new Post();

        $post->title = 'Post 2';
        $post->content = 'Contenido 2';
        $post->category = 'Categoría 2';
        $post->published_at = now();

        $post->save();
    }
}
