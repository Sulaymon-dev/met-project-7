<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Olympic;
use Faker\Generator as Faker;

$factory->define(Olympic::class, function (Faker $faker) {
    return [
        'subject_id' => \App\Subject::pluck('id')[$faker->numberBetween(1, \App\Subject::count() - 1)],
        'sinf_id' => \App\Sinf::pluck('id')[$faker->numberBetween(1, \App\Sinf::count() - 1)],
        'type' => $faker->randomElement(['гуманитари', 'дакик']),
        'test' => $faker->text,
        'pdf_src' => $faker->word . 'pdf',
    ];
});
