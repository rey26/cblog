<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->delete();

        factory(\App\User::class, 2)->create()->each(function ($u){
                    $u->posts()->save(factory(\App\Post::class)->create());

            }
        );


    }
}
