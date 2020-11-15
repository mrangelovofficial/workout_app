<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Routine;
use Faker\Generator as Faker;

$factory->define(Routine::class, function (Faker $faker) {
    return [
        'exercise_id' => $faker->biasedNumberBetween(1,10),
        'user_id' => 1,
        'day_of_week' => $faker->biasedNumberBetween(4,5),
        'sets' => $faker->biasedNumberBetween(1,4),
        'reps' => $faker->biasedNumberBetween(6,10),
        'exercise_order' => $faker->biasedNumberBetween(0,5),
    ];
});
