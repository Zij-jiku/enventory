<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;

class ProductsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::select('product_name','category_id','supplier_id','product_code','product_grage','product_route','buy_date' , 'expire_date' , 'buying_price' , 'selling_price' , 'product_photo')->get();
    }

}
