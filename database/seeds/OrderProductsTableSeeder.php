<?php

use Illuminate\Database\Seeder;
use App\Order_product;

class OrderProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order_product::truncate();

        for ($order = 1; $order <=2; $order++) {
            Order_product::create([
                'order_id' => 1,
                'product_id' => 2,
                'qty' => 1,
                'price' => 12
            ]);
        }


        for ($order = 1; $order <=2; $order++) {
            Order_product::create([
                'order_id' => 2,
                'product_id' => 2,
                'qty' => 2,
                'price' => 15
            ]);
        }
    }
}
