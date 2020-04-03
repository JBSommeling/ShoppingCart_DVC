<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order_product;
use Faker\Generator as Faker;

$factory->define(Order_product::class, function (Faker $faker) {
    return [
        'order_id' => 1,
        'product_id' => random_int(1, 25)
    ];
});
