<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Order\Order;
use App\Order\Order_detail;
use App\Order\Order_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Method to show all pending orders in pendingOrders page
     * @param $filter - the filter to be executed.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index($filter){
        $orders = Order::all();

        if ($filter == 'all') {
            return view('admin.orders.index', compact('orders'));
        }
        else {
            return view('admin.orders.filter', compact('orders', 'filter'));
        }
    }

    /**
     * Method to render all the orders placed by user.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function show(){
        $user = Auth::user();
        $orders = $user->orders;

        return view('user.order.show', compact('orders'));
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

            $cart = Session::get('cart');
            $items = $cart->items;

            // To return array of keys from items array.
            $products_id = array_keys($items);

            // To save each product in database.
            foreach ($products_id as $product) {
                $order_product = new Order_product();
                $order_product->order_id = $order->id;
                $order_product->product_id = $product;
                $order_product->qty = $items[$product]['qty'];
                $order_product->price = $items[$product]['price'];

                $order_product->save();
            }

            $order_detail = new Order_detail();
            $order_detail->order_id = $order->id;
            $order_detail->street = $request->street;
            $order_detail->postalcode = $request->postalcode;
            $order_detail->city = $request->city;
            $order_detail->country = $request->country;
            $order_detail->totalPrice = $cart->totalPrice;
            $order_detail->payment = false;
            $order_detail->save();

            Session::forget('cart');
            return redirect()->route('product.index');
        }
    }
}
