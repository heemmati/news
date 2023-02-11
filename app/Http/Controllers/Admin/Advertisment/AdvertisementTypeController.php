<?php

namespace App\Http\Controllers\Admin\Advertisment;

use App\Http\Controllers\Admin\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\Advertisment\AdvertismentTypeRepository;

class AdvertisementTypeController extends MainController
{
    public function __construct()
    {
        $this->repository = new AdvertismentTypeRepository();
    }

    public function store(Request $request)
    {

        DB::beginTransaction();

        $request->validate([

            'title' => ['required'],

        ]);

        $data = [
            'creator_id' => auth()->id(),
            'title' => $request->input('title'),
            'description' => $request->input('title'),
            'status' => 0,

        ];

        $type = $this->repository->store($data);
        if ($type){

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
        return view('advertisment::show');
    }


    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        $request->validate([

            'title' => ['required'],

        ]);

        $data = [

            'title' => $request->input('title'),
            'description' => $request->input('title'),


        ];

        $type = $this->repository->update($id , $data);
        if ($type){

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
