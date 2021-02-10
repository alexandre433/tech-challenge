<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Movie;
use Faker\Generator as Faker;

$factory->define(Movie::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'year' => $faker->year(),
        'synopsis' => $faker->text(),
        'runtime' => $faker->numberBetween(0, 600),
        'released_at' => $faker->date(),
        'cost' => $faker->numberBetween(),
    ];
});
