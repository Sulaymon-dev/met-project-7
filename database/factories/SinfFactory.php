<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sinf;
use Faker\Generator as Faker;

$factory->define(Sinf::class, function (Faker $faker) {
    return [
        'class'=>$faker->numberBetween(1,11),
        'slug'=>$faker->slug,
        'status'=>$faker->numberBetween(0,1),
            ];
});
