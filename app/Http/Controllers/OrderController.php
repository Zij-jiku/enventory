<?php

namespace App\Http\Controllers;

use App\Order;
use App\Order_detail;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;


class OrderController extends Controller
{
    public function ordersubmit(Request $request){
        $order_id = Order::insertGetId([
            'customer_id' => $request->customer_id,
            'order_date' => $request->order_date,
            'order_status' => $request->order_status,
            'sub_total' => $request->sub_total,
            'vat' => $request->vat,
            'total_products' => $request->total_products,
            'payment_status' => $request->payment_status,
            'total' => $request->total,
            'pay' => $request->pay,
            'due' => $request->due,
        ]);

        $contents = Cart::content();
        foreach($contents as $content){
            Order_detail::insert([
                'order_id'  => $order_id,
                'product_id'  => $content->id,
                'quantity'  => $content->qty,
                'unitcost'  => $content->price,
                'total'  => $content->total,
            ]);
        }
        Cart::destroy();

        return redirect('/pos')->with('success_message' , 'Your Order Successfully Done!!!');

    }
}
