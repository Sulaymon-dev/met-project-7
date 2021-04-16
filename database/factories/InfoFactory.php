<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Info;
use Faker\Generator as Faker;

$factory->define(Info::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'text' => $faker->text,
        'status' => 1
    ];
});
