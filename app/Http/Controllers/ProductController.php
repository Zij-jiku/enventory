<?php

namespace App\Http\Controllers;

use Image;
use App\Product;
use App\Category;
use App\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.index',[
            'category_info' => Category::all(),
            'supplier_info' => Supplier::all(),
          ]);
    }

    public function productsview()
    {
        return view('admin.product.show',[
            'product_info' => Product::all(),
            'total_products' => Product::count(),
          ]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'category_id' => 'required',
            'supplier_id' => 'required',
            'product_code' => 'required',
            'product_grage' => 'required',
            'product_route' => 'required',
            'buy_date' => 'required',
            'expire_date' => 'required',
            'buying_price' => 'required',
            'selling_price' => 'required',
            'product_photo' => 'required',
          ]);
  
          $product_id = Product::insertGetId($request->except('_token' , 'product_photo') + [
            'created_at' => Carbon::now(),
          ]);
          if($request->hasFile('product_photo')){
            $uploded_photo = $request->file('product_photo');
            $new_photo_name = $product_id.'.'.$uploded_photo->getClientOriginalExtension();
            $new_photo_location = 'public/uploads/product_photos/'.$new_photo_name;
            Image::make($uploded_photo)->resize(128,128)->save(base_path($new_photo_location) , 70);
            Product::find($product_id)->update([
              'product_photo' => $new_photo_name
            ]);
          }
          return back()->with('success_status',$request->product_name.' Product Insert SuccessFully!!');
    }

    public function importproduct(){
      return view('admin.productexcelimport.import');
    }

    public function export(){
      return Excel::download(new ProductsExport, 'products.xlsx');
    }
    
    public function import(Request $request){
      Excel::import(new ProductsImport, $request->file('import_file'));
      return back()->with('success_status',' Xlxs File Insert SuccessFully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }

    
}
