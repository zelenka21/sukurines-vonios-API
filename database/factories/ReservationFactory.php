<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reservation;
use Faker\Generator as Faker;

$factory->define(Reservation::class, function (Faker $faker) {
    return [

        'user_id' => factory(\App\User::class),
        'apartment_id' => factory(\App\Apartment::class),
        'guestCount' => $faker->randomDigit,
        'arrival' => $faker->dateTimeBetween('+1 week', '+1 month'),
        'departure' => $faker->dateTimeBetween('+1 week', '+1 month')
        //
    ];


});
