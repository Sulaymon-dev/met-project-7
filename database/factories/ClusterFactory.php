<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cluster;
use Faker\Generator as Faker;

$factory->define(Cluster::class, function (Faker $faker) {
    return [
        'index' => $faker->numberBetween(1, 5),
        'name' => $faker->name,
        'status' => $faker->numberBetween(0, 1)
    ];
});
