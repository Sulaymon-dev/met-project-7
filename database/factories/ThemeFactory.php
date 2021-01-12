<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Theme;
use Faker\Generator as Faker;

$factory->define(Theme::class, function (Faker $faker) {
    return [
        'plan_id' => \App\Plan::pluck('id')[$faker->numberBetween(1, \App\Plan::count() - 1)],
        'user_id' => 1,
        'theme_num' => $faker->numberBetween(1, 100),
        'name' => $faker->name,
        'introduction' => $faker->text,
        'video_src' => $faker->name . 'mp4',
        'pdf_src' => $faker->word . 'pdf',
        'test' => $faker->text,
        'pdf_exercise' => $faker->text,
        'view_count' => $faker->randomNumber(),
    ];
});
