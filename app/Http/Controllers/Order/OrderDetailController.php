<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Order_detail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{

    /**
     * Method to update payment form false to true
     * @param $order_detail_id - id of the order_detail record to be updated.
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update($order_detail_id){
        $order_detail = Order_detail::find($order_detail_id);
        $order_detail->payment = true;
        $order_detail->save();

        return redirect()->route('order.admin.index');
    }
}
