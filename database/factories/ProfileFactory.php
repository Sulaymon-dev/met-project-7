<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'user_id' =>1,
        'phone' => $faker->phoneNumber,
        'avatar'=>$faker->name.'jpg',
        'experience'=>$faker->numberBetween(1,5),
        'address'=>$faker->address,
        'gender'=>$faker->randomElement(['M','F']),
    ];
});
