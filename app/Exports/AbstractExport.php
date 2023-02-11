<?php


namespace App\Exports;


use App\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class AbstractExport implements FromCollection
{

    /**
     * @return Collection
     *
     */

    public function collection()
    {
        $dd = DB::table('abstract_products')->select('id', 'code', 'price', 'price1', 'price2', 'price3', 'price4')->get();
        $DD2 = User::all();


        return User::all();
    }
}
