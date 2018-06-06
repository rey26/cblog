<?php

use Faker\Generator as Faker;
use \App\Post;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/


$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'slug' => $faker->unique()->slug,
        'cat_id' => function(){
            return factory(\App\Cat::class)->create()->id;
        },
        'user_id' => function(){
            return factory(\App\User::class)->create()->id;
        },
        'subtitle' => $faker->text(),
        'body'=>$faker->paragraph()
    ];
});
