<?php

use Faker\Generator as Faker;

$factory->define(App\Review::class, function (Faker $faker) {
    return [
        'content' => $faker->text,
        'author' => $faker->name
    ];
});
