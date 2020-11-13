<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'product_name' => $row[0],
            'category_id' => $row[1],
            'supplier_id' => $row[2],
            'product_code' => $row[3],
            'product_grage' => $row[4],
            'product_route' => $row[5],
            'buy_date' => $row[6],
            'expire_date' => $row[7],
            'buying_price' => $row[8],
            'selling_price' => $row[9],
            'product_photo' => $row[10],
        ]);
    }
}
