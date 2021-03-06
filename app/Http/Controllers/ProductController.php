<?php

namespace App\Http\Controllers;

use App\Cart\Cart;
use Illuminate\Http\Request;
use App\Product\Category;
use App\Product\Product;

class ProductController extends Controller
{
    /**
     * Method to view product index
     */
    public function index(){
        $categories = Category::all();
        $products = Product::all();

        if ($products == null) {
            return abort(404);
        }
        if ($categories == null) {
            return abort(404);
        }
        return view('shop.index', compact('categories', 'products'));
    }

    /**
     * Method to view product details.
     * @param $product_id - the parameter given when clicking on product to show more details.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($product_id){
        $product = Product::find($product_id);
        $categories = Category::all();

        if ($product == null) {
            return abort(404);
        }
        if ($categories == null) {
            return abort(404);
        }
        return view('shop.product', compact('categories', 'product'));
    }

    /**
     * Method to view filtered products by category.
     * @param $filter - the parameter given when clicking on category or searching by name on product index page.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function filter($filter) {
        $product = new Product();

        switch ($filter) {
            case 'books':
                $products = $product->getProducts(1);
                break;
            case 'movies':
                $products = $product->getProducts(2);
                break;
            case 'music':
                $products = $product->getProducts(3);
                break;
            case 'games':
                $products = $product->getProducts(4);
                break;
            case 'instruments':
                $products = $product->getProducts(5);
                break;
            case 'all':
                $products = Product::all();
                break;
            default:
                $products = $product->searchProducts($filter);
        }

        return view('shop.filter', compact('products'));
    }

    /**
     * Method to add product to cart.
     * @param Request $request - contains post information from form.
     * @return \Illuminate\Http\RedirectResponse
     */

    public function addToCart(Request $request){
        $product = Product::find($request->product_id);
        if ($product == null) {
            return abort(404);
        }
        $cart = new Cart();
        $cart->add($product, $product->id, $request->amount);

        return redirect()->route('product.index');
    }

    /**
     * Method to show shopping cart.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function showCart(){
        $cart = new Cart();

        $productNr = 1;
        $products = $cart->items;
        $totalPrice = $cart->totalPrice;

        return view('shop.cart', compact('products', 'totalPrice', 'productNr'));
    }

    /**
     * Method to edit products in cart.
     * @param Request $request - contains post information from form.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editCart(Request $request){
        $cart = new Cart();

        $product = Product::find($request->product_id);
        if ($product == null) {
            return abort(404);
        }

        $cart->editAmount($product, $product->id, $request->amount);
        return redirect()->route('product.cart');
    }
}
