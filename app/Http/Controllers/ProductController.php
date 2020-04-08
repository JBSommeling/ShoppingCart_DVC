<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Method to view product index
     */
    public function index(){
        $categories = Category::all();
        $products = Product::all();
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
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id, $request->amount);

        Session::put('cart', $cart);
        return redirect()->route('product.index');
    }

    /**
     * Method to show shopping cart.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function showCart(){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

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
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        $product = Product::find($request->product_id);

        $cart->editAmount($product, $product->id, $request->amount);

        Session::put('cart', $cart);
        return redirect()->route('product.cart');
    }
}
