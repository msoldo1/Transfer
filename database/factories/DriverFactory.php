<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Driver;
use App\Model;
use App\User;
use Faker\Generator as Faker;

$factory->define(Driver::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'active' => 1,
        'user_id' => 2,
    ];
});
