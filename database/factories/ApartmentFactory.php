<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Apartment;
use Faker\Generator as Faker;

$factory->define(Apartment::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'location' => $faker->address,
        'image' => 'img/img.jpg'

    ];
});
