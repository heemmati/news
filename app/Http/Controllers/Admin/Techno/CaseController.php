<?php

namespace Modules\Techno\Http\Controllers\Admin;

use App\Http\Controllers\Admin\MainController;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Techno\Repository\CaseRepository;

class CaseController extends MainController
{
    public function __construct()
    {
        $this->repository = new CaseRepository();
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        $request->validate([
            'title' => 'required' ,
            'parent_id' => 'required' ,
            'price'  => 'required|numeric' ,
        ]);

        $data = [
            'creater_id' => auth()->id()	,
            'title' => $request->input('title')	,
            'link' => $request->input('link')	,
            'price' => $request->input('price') ,
            'parent_id' => $request->input('parent_id') ,
            'infect' => $request->input('infect') ,
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
        return view('portofolio::show');
    }


    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        $request->validate([
            'title' => 'required' ,
            'group_id' => 'required',
                  'price'  => 'required|numeric' ,
        ]);

        $data = [
            'title' => $request->input('title')	,
            'price' => $request->input('price') ,
            'group_id' => $request->input('group_id') ,
        ];

        if ($this->repository->update( $id , $data)){

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
