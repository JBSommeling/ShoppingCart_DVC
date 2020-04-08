<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Method to render shop.checkout view with POST form, if authenticated.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function create(){
        $user = Auth::user();
        $total = Session::get('cart')->totalPrice;
        return view('shop.checkout', compact('user', 'total'));
    }


    public function store(Request $request){


        $validatedData = $request->validate([
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



        if ($validatedData) {
            $order = new Order();
            dd(Auth::user()->id);
            $order->store(Auth::user()->id);
        }
    }
}
