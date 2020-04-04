<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class ProductController extends Controller
{
    public function index(){
        $categories = Category::all();
        $products = Product::all();
        return view('shop.index', compact('categories', 'products'));
    }
}
