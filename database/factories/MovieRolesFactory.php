<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\MovieRoles;
use Faker\Generator as Faker;

$factory->define(MovieRoles::class, function (Faker $faker) {
    return [
        'name' => 'role_' . $faker->name(),
    ];
});
