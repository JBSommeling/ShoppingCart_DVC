<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order_detail;
use Faker\Generator as Faker;

$factory->define(Order_detail::class, function (Faker $faker) {
    return [
        //'order_id' => factory('App\Order')->create()->id,
        'order_id' => 1,
        'street' => $faker->streetAddress,
        'postalcode' => $faker->postcode,
        'city' => $faker->city,
        'country' => $faker->country
    ];
});
