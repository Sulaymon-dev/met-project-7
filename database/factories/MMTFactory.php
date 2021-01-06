<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MMT;
use Faker\Generator as Faker;

$factory->define(MMT::class, function (Faker $faker) {
    return [
        'mmt_fan_id' => \App\MmtFan::pluck('id')[$faker->numberBetween(1, \App\MmtFan::count() - 1)],
        'subject_id' => \App\Subject::pluck('id')[$faker->numberBetween(1, \App\Subject::count() - 1)],
        'cluster_id' => \App\Cluster::pluck('id')[$faker->numberBetween(1, \App\Cluster::count() - 1)],
        'component' => $faker->randomElement(['a', 'b', 'c']),
    ];
});
