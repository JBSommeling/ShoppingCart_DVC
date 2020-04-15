<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Order;
use App\Order_detail;
use App\Order_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index(){

    }

    /**
     * Method to render shop.checkout view with POST form, if authenticated.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function create(){
        $fields = [
            'name' => 'Naam',
            'street' => 'Straat',
            'postalcode' => 'Postcode',
            'city' => 'Woonplaats',
            'country' => 'Land',
            'card-name' => 'Naamhouder van kaart',
            'card-number' => 'Kaartnummer',
            'card-expiry-month' => 'Maand',
            'card-expiry-year' => 'Jaar',
            'card-cvc' => 'CVC'
        ];

        $user = Auth::user();
        $total = Session::get('cart')->totalPrice;
        return view('shop.checkout', compact('user', 'total', 'fields'));
    }

    /**
     * Method to store given values to database, if validated. Used Eloquent for database queries.
     * @param Request $request  - contains post information from form.
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(Request $request){
        $validatedData = Validator::make($request->all(),[
           'name' => 'required',
           'street' => 'required',
            'postalcode' => 'required|max:6',
            'city' => 'required',
            'country' => 'required',
            'card-name' => 'required',
            'card-number' => 'required|min:9|max:9',
            'card-expiry-month' => 'required|min:1|max:2',
            'card-expiry-year' => 'required|min:4|max:4',
            'card-cvc' => 'required|min:4|max:4'
        ],
            [
                'required' => 'You need to fill in a :attribute',
                'postalcode.required' => 'You need to fill in a :attribute of 6 characters',
                'card-number.required' => 'You need to fill in a :attribute of 9 characters',
                'card-expiry-month.required' => 'You need to fill in a :attribute of 2 characters',
                'card-cvc.required' => 'You need to fill in a :attribute of 4 characters'
            ]
        );

        if ($validatedData->fails()){
            $errormessages = $validatedData->messages()->get('*');
            return redirect()->back()->withInput()->withErrors($errormessages);
        }
        else{
            $order = new Order();
            $order->user_id = Auth::user()->id;
            $order->save();

            $latestOrder = Order::find($order->id);
            $cart = Session::get('cart');
            $items = $cart->items;
            $products_id = array_keys($items);

            foreach ($products_id as $product) {
                $order_product = array(
                    new Order_product(array(
                        'order_id' => $order->id,
                        'product_id' => $product,
                        'qty' => $items[$product]['qty'],
                        'price' => $items[$product]['price']
                    )),
                );
                $latestOrder->order_product()->saveMany($order_product);
            }

            $order_detail = array(
                new Order_detail(array(
                    'order_id' => $order->id,
                    'street' => $request->street,
                    'postalcode' => $request->postalcode,
                    'city' => $request->city,
                    'country' => $request->country,
                    'totalPrice' => $cart->totalPrice,
                    'payment' => false
                ))
            );
            $latestOrder->order_detail()->saveMany($order_detail);

            Session::forget('cart');
            return redirect()->route('product.index');
        }
    }
}
