<?php

use Illuminate\Database\Seeder;
use App\Product\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        Category::create([
           'name' => 'Boeken'
        ]);

        Category::create([
            'name' => 'Films'
        ]);

        Category::create([
            'name' => 'Muziek'
        ]);

        Category::create([
            'name' => 'Games'
        ]);

        Category::create([
            'name' => 'Instrumenten'
        ]);
    }
}
