<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Plan;
use Faker\Generator as Faker;

$factory->define(Plan::class, function (Faker $faker) {
    return [
        'subject_id' => \App\Subject::pluck('id')[$faker->numberBetween(1, \App\Subject::count() - 1)],
        'sinf_id' => \App\Sinf::pluck('id')[$faker->numberBetween(1, \App\Sinf::count() - 1)],
        'book_id' => \App\Book::pluck('id')[$faker->numberBetween(1, \App\Book::count() - 1)],
        'status' => $faker->numberBetween(0, 1),
    ];
});
