<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Model\Shop\AbstractProduct;

class ProductExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //

        return DB::table('abstract_products')->select('id', 'code', 'price', 'price1', 'price2', 'price3', 'price4')->get();

    }
}
