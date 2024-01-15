<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Post;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get alle users
        $users = User::all();

        // Get alle posts
        $posts = Post::all();

        foreach ($users as $user) {
            foreach ($posts as $post) {
                DB::table('likes')->insert([
                    'post_id' => $post->id,
                    'user_id' => $user->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
