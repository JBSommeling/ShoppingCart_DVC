<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    /**
     * Function to get products filtered by category_id.
     * @param $cat_id - the category id of the products.
     * @return \Illuminate\Support\Collection
     */
    public function getProducts($cat_id) {
        $products = DB::table('products')
            ->join('product_categories', 'product_categories.product_id', '=', 'products.id')
            ->where('product_categories.cat_id', $cat_id)
            ->get();
        return $products;
    }

    public function searchProducts($filter) {
        $search = '%'.$filter.'%';
        $products = DB::table('products')
            ->where('title', 'like', $search)
            ->get();
        return $products;
    }
}
