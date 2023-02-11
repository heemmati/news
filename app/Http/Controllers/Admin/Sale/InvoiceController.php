<?php

namespace Modules\Sale\Http\Controllers\Admin;

use App\Http\Controllers\Admin\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Sale\Repository\InvoiceRepository;

class InvoiceController extends MainController
{
    public function __construct()
    {
        $this->repository = new InvoiceRepository();
    }

    public function store(Request $request)
    {

        DB::beginTransaction();
        $request->validate([
            'sale_id' => 'required'
        ]);

        $data = [
            'min_price' => $request->input('min_price'),
            'max_price' => $request->input('max_price'),
            'sale_id'  => $request->input('sale_id'),
        ];
        if ($this->repository->store($data)){

            DB::commit();
            toast('انجام شد!', 'success');
            return back();

        } else {
            DB::rollBack();
            toast('دقایقی بعد مجددا تلاش کنید!', 'error');
            return back();
        }
    }

    public function show($id)
    {
        return view('techno::show');
    }


    public function update(Request $request, $id)
    {

        DB::beginTransaction();
        $request->validate([
            'sale_id' => 'required'
        ]);

        $data = [
            'min_price' => $request->input('min_price'),
            'max_price' => $request->input('max_price'),
            'sale_id'  => $request->input('sale_id'),
        ];
        if ($this->repository->update($id , $data)){

            DB::commit();
            toast('انجام شد!', 'success');
            return back();

        } else {
            DB::rollBack();
            toast('دقایقی بعد مجددا تلاش کنید!', 'error');
            return back();
        }
    }

}
