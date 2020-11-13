<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{

    public function index(Request $request){

        $product = Product::where('id' , $request->id)->first();
        Cart::add([
            'id' => $request->id,
            'name' => $product->product_name,
            'qty' => $request->qty,
            'price' => $product->selling_price,
            'weight' => 550
        ]);
        return back()->with('success_cart' , 'Cart Added Successfully!!');
    }



    public function updatetocart(Request $request){
        Cart::update($request->rowId, $request->qty);
        return back()->with('success_update' , 'Product Quantity Update Successfully!!');
    }

    public function deletetocart($rowId){
        Cart::remove($rowId);
        return back()->with('success_delete' , 'Cart Delete Successfully!!');
    }

    public function invoicecreate(Request $request){

        $request->validate([
            'customer_id' => 'required',
        ]);

        $customer = Customer::where('id' , $request->customer_id)->first();
        $contents = Cart::content();

        return view('admin.invoice.index' , compact('customer' , 'contents'));

    }



}
