<?php

use Illuminate\Database\Seeder;
use App\Order\Order;

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
            'user_id' => 2
        ]);

        Order::create([
            'user_id' => 2
        ]);
    }
}
