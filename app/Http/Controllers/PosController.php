<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Product;
use Illuminate\Http\Request;

class PosController extends Controller
{
    public function index(){
        // $product_info = Product::join('categories' , 'products.category_id' , 'categories.id')->get();
        $product_info = Product::all();
        $customers = Customer::all();
        return view('admin.pos.index' , compact('product_info' , 'customers'));

        
    }
}
