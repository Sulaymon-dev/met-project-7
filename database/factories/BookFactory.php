<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'img_src' => $faker->name . 'jpg',
        'pdf_src' => $faker->word . '.pdf',
        'slug' => $faker->slug,
        'status' => $faker->numberBetween(0, 1)
    ];
});
