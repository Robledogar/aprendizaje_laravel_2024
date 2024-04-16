<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $post = Post::create([
            'title' => 'Primer título',
            'slug' => 'primer-titulo',
            'body' => 'lorem hhsdhfhdh sdddjdjd ssseeeekkkff'
        ]);
    }
}
