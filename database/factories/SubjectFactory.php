<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Subject;
use Faker\Generator as Faker;

$factory->define(Subject::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'slug'=>$faker->slug,
        'status'=>$faker->numberBetween(0,1),
    ];
});
