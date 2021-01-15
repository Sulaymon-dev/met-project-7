<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'user_id' =>  \App\User::pluck('id')[$faker->numberBetween(1, \App\User::count() - 1)],
        'img_src' => $faker->name . 'jpg',
        'pdf_src' => $faker->word . '.pdf',
        'slug' => $faker->slug,
        'status' => $faker->numberBetween(0, 1)
    ];
});
