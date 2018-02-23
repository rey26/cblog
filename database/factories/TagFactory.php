<?php

use Faker\Generator as Faker;

$factory->define(App\Tag::class, function (Faker $faker) {
static $password;

return [
'id' => $faker->word,
'name'=>$faker->word,
];
});