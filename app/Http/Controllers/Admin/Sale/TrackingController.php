<?php

namespace Modules\Sale\Http\Controllers\Admin;

use App\Http\Controllers\Admin\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Sale\Repository\TrackingRepository;

class TrackingController extends MainController
{

    public function __construct()
    {
        $this->repository = new TrackingRepository();
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        $request->validate([
            'sale_id' => ['required'],
        ]);

        $data = [

            'sale_id' => $request->input('sale_id'),
            'isay' => $request->input('isay'),
            'hesay' => $request->input('hesay'),
            'description' => $request->input('description')
        ];

        if ($this->repository->store($data)) {

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
            'sale_id' => ['required'],
        ]);

        $data = [

            'sale_id' => $request->input('sale_id'),
            'isay' => $request->input('isay'),
            'hesay' => $request->input('hesay'),
            'description' => $request->input('description')
        ];

        if ($this->repository->update( $id , $data)) {

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
