<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;


$factory->define(\App\Truck::class, function (Faker $faker) {
    return [
        'brand' => 'Mercedes',
        'capacity' => '400',
        'type' => 'cooler',
        'user_id' => 2,
    ];
});
