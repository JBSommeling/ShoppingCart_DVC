<?php

use Illuminate\Database\Seeder;
use App\Order\Order_detail;
use App\Order\Order;
use App\Order\Order_product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        factory(\App\User::class, 10)->create();


        $this->call(ProductsTableSeeder::class);
        $this->call(OrderDetailTableSeeder::class);

        $this->call(OrderTableSeeder::class);

        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductCategoriesTableSeeder::class);

        $this->call(OrderProductsTableSeeder::class);

        factory(Order::class, 10)->create()->each(function ($order) {
            factory(Order_detail::class, 1)->create(['order_id' => $order->id]);
            factory(Order_product::class, 3)->create(['order_id' => $order->id]);
        });
    }
}
