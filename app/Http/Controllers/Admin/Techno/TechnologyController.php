<?php

namespace Modules\Techno\Http\Controllers\Admin;

use App\Http\Controllers\Admin\MainController;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Techno\Repository\TechnologyRepository;

class TechnologyController extends MainController
{

    public function __construct()
    {
        $this->repository = new TechnologyRepository();
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        $request->validate([
            'title' => 'required'
        ]);

        $data = [
            'creater_id' => auth()->id() ,
            'title' => $request->input('title'),
            'entitle' => $request->input('entitle'),
            'link' => $request->input('link')	,
            'price' => $request->input('price') ,
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
            'title' => 'required'
        ]);

        $data = [
            'title' => $request->input('title'),
            'entitle' => $request->input('entitle'),
            'link' => $request->input('link')	,
            'price' => $request->input('price') ,
            'infect' => $request->input('infect') ,
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
