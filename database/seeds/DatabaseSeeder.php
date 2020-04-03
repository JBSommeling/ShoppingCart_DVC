<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Order_detail;

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
        $this->call(RolesTableSeeder::class);
        factory(\App\User::class, 10)->create()->each(function($user){
            factory(Role::class, 1)->create(['user_id' => $user->id]);
        });


        $this->call(ProductsTableSeeder::class);
        $this->call(OrderDetailTableSeeder::class);

        $this->call(OrderTableSeeder::class);

        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductCategoriesTableSeeder::class);

        $this->call(OrderProductsTableSeeder::class);

        factory(\App\Order::class, 10)->create()->each(function ($order) {
            factory(Order_detail::class, 1)->create(['order_id' => $order->id]);
            factory(\App\Order_product::class, 3)->create(['order_id' => $order->id]);
        });
    }
}
