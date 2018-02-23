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
        factory(\App\User::class, 2)->create()->each(function ($u)
            {
                foreach (range(1, 4) as $i) {
                    $u->posts()->save(factory(\App\Post::class)->make());


            }
        }
        );


    }
}
