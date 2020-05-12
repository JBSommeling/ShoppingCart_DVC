<?php

use Illuminate\Database\Seeder;
use App\Order\Order_detail;

class OrderDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order_detail::truncate();

        Order_detail::create([
            'order_id' => 1,
            'street' => 'Leerparkpromenade 100',
            'postalcode' => '3312 KW',
            'city' => 'Dordrecht',
            'country' => 'Netherlands',
            'totalPrice' => 24,
            'payment' => true
        ]);

        Order_detail::create([
            'order_id' => 2,
            'street' => 'Leerparkpromenade 100',
            'postalcode' => '3312 KW',
            'city' => 'Dordrecht',
            'country' => 'Netherlands',
            'totalPrice' => 24,
            'payment' => false
        ]);
    }
}
