<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $tags = Tag::factory(10)->create();
        
        // for ($i=0; $i < 10; $i++) { 
        //     $user = User::factory()->create();
        //     $posts = Post::factory(10)->create();
        //     foreach ($posts as $post) {
        //         $post->attach($tags->random(3));
        //     }
        //     $user->has($posts);
        // }
        User::factory(10)->has(Post::factory()->count(10))->create();

        User::factory()->has(Post::factory()->count(10))->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);
        $posts = Post::all();
        foreach ($posts as $post) {
            $post->tags()->attach($tags->random(3));
        }
    }
}
