<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'author' => $faker->name,
        'isbn' => $faker->isbn10,
        'year' => $faker->year
    ];
});
