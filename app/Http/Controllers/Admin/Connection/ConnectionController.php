<?php

namespace Modules\Connection\Http\Controllers\Admin;

use App\Http\Controllers\Admin\MainController;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Repositories\Connection\ConnectionRepository;

class ConnectionController extends MainController
{

    public function __construct()
    {
        $this->repository = new ConnectionRepository();
    }
    public function store(Request $request)
    {

        DB::beginTransaction();

        $request->validate([
         'title'=> 'required'
        ]);

        $data = [
            'creator_id' => auth()->id(),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'parent_id' => $request->input('parent_id')
        ];

        $connection = $this->repository->store($data);
        if ($connection){
            DB::commit();
            toast('انجام شد!', 'success');
            return back();

        } else {
            DB::rollBack();
            toast('دقایقی بعد مجددا تلاش کنید!', 'error');
            return back();
        }

    }


    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        $request->validate([
            'title'=> 'required'
        ]);

        $data = [

            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'parent_id' => $request->input('parent_id')
        ];

        $connection = $this->repository->update( $id , $data);
        if ($connection){
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
