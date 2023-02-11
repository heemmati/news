<?php

namespace App\Http\Controllers\Admin\Newspaper;

use App\Http\Controllers\Admin\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\Newspaper\NewspaperTypeRepository;

class NewspaperTypesController extends MainController
{

    public function __construct()
    {
        $this->repository = new NewspaperTypeRepository();
    }

    public function store(Request $request)
    {
        $request->validate([
            'creator_id',
            'title',
            'code',
            'status'
        ]);
        $data = [
            'creator_id' => auth()->id(),
            'title' => $request->input('title'),
            'code' => $request->input('code'),
            'status' => 0
        ];

        $type = $this->repository->store($data);
        if ($type) {

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
        $request->validate([
            'creator_id',
            'title',
            'code',
            'status'
        ]);
        $data = [

            'title' => $request->input('title'),
            'code' => $request->input('code'),
            'status' => 0
        ];

        $type = $this->repository->update($id, $data);
        if ($type) {

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
