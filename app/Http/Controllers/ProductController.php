<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class ProductController extends Controller
{
    /**
     * Function to view product index
     */
    public function index(){
        $categories = Category::all();
        $products = Product::all();
        return view('shop.index', compact('categories', 'products'));
    }

    /**
     * Function to view product details.
     * @param $product_id - the parameter given when clicking on product to show more details.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($product_id){
        $product = Product::find($product_id);
        $categories = Category::all();
        return view('shop.product', compact('categories', 'product'));
    }

    /**
     * Function to view filtered products by category.
     * @param $filter - the parameter given when clicking on category or searching by name on product index page.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function filter($filter) {
        $product = new Product();
        if ($filter == 'books') {
            $products = $product->getProducts(1);
        }

        else if ($filter == 'movies') {
            $products = $product->getProducts(2);
        }

        else if ($filter == 'music') {
            $products = $product->getProducts(3);
        }

        else if ($filter == 'games') {
            $products = $product->getProducts(4);
        }

        else if ($filter == 'instruments') {
            $products = $product->getProducts(5);
        }

        else {
            $products = $product->searchProducts($filter);
        }

        return view('shop.filter', compact('products'));
    }

}
