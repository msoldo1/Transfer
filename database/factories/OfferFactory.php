<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Offer;
use Faker\Generator as Faker;

$factory->define(Offer::class, function (Faker $faker) {
    return [
        'truck_id' => factory(\App\Truck::class)->create(),
        'driver_id' => factory(\App\Driver::class)->create(),
        'company_id' => 2,
        'start' => $faker->city,
        'destination' => $faker->city,
        'date' => $faker->date(),
        'price' => $faker->numberBetween(1000,20000),
    ];
});
