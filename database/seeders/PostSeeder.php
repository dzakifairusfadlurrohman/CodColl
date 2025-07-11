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
        Post::create([
            'title' => 'Post Dummy 1',
            'slug' => 'post-dummy-1',
            'content' => '<p>Isi konten dari post dummy pertama.</p>',
        ]);

        Post::create([
            'title' => 'Post Dummy 2',
            'slug' => 'post-dummy-2',
            'content' => '<p>Isi konten dari post dummy kedua.</p>',
        ]);
    }
}
