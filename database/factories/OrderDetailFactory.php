<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order_detail;
use Faker\Generator as Faker;

$factory->define(Order_detail::class, function (Faker $faker) {
    return [
        'order_id' => 1,
        'street' => $faker->streetAddress,
        'postalcode' => $faker->postcode,
        'city' => $faker->city,
        'country' => $faker->country,
        'payment' => false,
        'totalPrice' => random_int(1, 100)
    ];
});
