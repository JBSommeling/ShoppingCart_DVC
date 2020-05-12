<?php

use Illuminate\Database\Seeder;
use App\Product\Product_category;

class ProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product_category::truncate();

        for ($product = 1; $product <=5; $product++) {
            Product_category::create([
                'product_id' => $product,
                'cat_id' => 1
            ]);
        }

        for ($product = 6; $product <=10; $product++) {
            Product_category::create([
                'product_id' => $product,
                'cat_id' => 2
            ]);
        }

        for ($product = 11; $product <=15; $product++) {
            Product_category::create([
                'product_id' => $product,
                'cat_id' => 3
            ]);
        }

        for ($product = 16; $product <=20; $product++) {
            Product_category::create([
                'product_id' => $product,
                'cat_id' => 4
            ]);
        }

        for ($product = 21; $product <=25; $product++) {
            Product_category::create([
                'product_id' => $product,
                'cat_id' => 5
            ]);
        }
    }
}
