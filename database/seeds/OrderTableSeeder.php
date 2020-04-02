<?php

use Illuminate\Database\Seeder;
use App\Order;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::truncate();

        Order::create([
            'product_id' => 3,
            'user_id' => 2
        ]);

        Order::create([
            'product_id' => 3,
            'user_id' => 2
        ]);
    }
}
