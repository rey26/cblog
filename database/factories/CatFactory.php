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

$factory->define(App\Cat::class, function (Faker $faker) {
    static $password;

    return [
        'keyword' => $faker->name,
        'skWord'=>$faker->name,
    ];
});
