<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    public function getProducts($cat_id) {
        $products = DB::table('products')
            ->join('product_categories', 'product_categories.product_id', '=', 'products.id')
            ->where('product_categories.cat_id', $cat_id)
            ->get();
        return $products;
    }
}
