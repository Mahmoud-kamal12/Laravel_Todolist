<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Todo\Todo;
use Faker\Generator as Faker;

$factory->define(Todo::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->sentence(3),
        'description' => $faker->text(100),
        'completed' => false
    ];
});
