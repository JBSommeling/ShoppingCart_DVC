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
     * Function to view filtered products by category
     * @param $filter - the parameter given when clicking on category on product index page.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function filter($filter) {
        $product = new Product();
        if ($filter == 'books') {
            $products = $product->getProducts(1);
            return view('shop.filter', compact('products'));
        }

        if ($filter == 'movies') {
            $products = $product->getProducts(2);
            return view('shop.filter', compact('products'));
        }

        if ($filter == 'music') {
            $products = $product->getProducts(3);
            return view('shop.filter', compact('products'));
        }

        if ($filter == 'games') {
            $products = $product->getProducts(4);
            return view('shop.filter', compact('products'));
        }

        if ($filter == 'instruments') {
            $products = $product->getProducts(5);
            return view('shop.filter', compact('products'));
        }
    }

}
