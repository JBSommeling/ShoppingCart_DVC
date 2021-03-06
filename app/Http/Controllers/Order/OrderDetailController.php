<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Order\Order_detail;
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
        if ($order_detail == null) {
            return abort(404);
        }
        $order_detail->payment = true;
        $order_detail->save();

        $filter = 'all';

        return redirect()->route('order.admin.index', $filter);
    }

}
