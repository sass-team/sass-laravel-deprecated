<?php

use App\User;

$factory->define(User::class, function (Faker\Generator $faker) {
    return [
        'name'           => $faker->name,
        'email'          => $faker->unique()->email,
        'remember_token' => str_random(10),
    ];
});
