<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order_detail;
use Faker\Generator as Faker;

$factory->define(Order_detail::class, function (Faker $faker) {
    return [
        'order_id' => factory('App\Order')->create()->id,
        'street' => 'Leerparkpromenade 100',
        'postalcode' => '3312 KW',
        'city' => 'Dordrecht',
        'country' => 'Nederland'
    ];
});
