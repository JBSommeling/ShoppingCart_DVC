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
        factory(Role::class, 10)->create();

        $this->call(ProductsTableSeeder::class);
        $this->call(OrderDetailTableSeeder::class);

        $this->call(OrderTableSeeder::class);
        factory(Order_detail::class, 10)->create();

        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductCategoriesTableSeeder::class);


    }
}
