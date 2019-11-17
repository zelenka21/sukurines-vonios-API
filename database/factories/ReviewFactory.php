<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\User::class),
        'apartment_id' => factory(\App\Apartment::class),
        'title' => $faker->sentence,
        'reviewText' => $faker->paragraph,
        'rating' => $faker->randomDigit
    ];

});
