<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MmtFan;
use Faker\Generator as Faker;

$factory->define(MmtFan::class, function (Faker $faker) {
    return [
        'test' => $faker-> text,
        'pdf_src' => $faker-> word.'pdf',
    ];
});
