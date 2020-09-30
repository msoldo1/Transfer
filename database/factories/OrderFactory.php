<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'price' => 1400,
        'start' => 'Zagreb',
        'destination' => 'Split',
        'date' => $faker->date(),
        'customer_id' => 3
    ];
});
