<?php

namespace App\Http\Controllers\Admin\Advertisment;

use App\Http\Controllers\Admin\MainController;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Advertisment\Repository\AdsTariffRepository;

class AdsTariffsController extends MainController
{

    public function __construct()
    {
        $this->repository = new AdsTariffRepository();
    }

    public function store(Request $request)
    {
     $request->validate([
         'type_id' => ['required'],
         'title' => ['required'],
     ]);

     $data = [
         'creator_id' => auth()->id(),
         'type_id' => $request->input('type_id'),
         'title' => $request->input('title'),
         'description' => $request->input('description'),
         'price' => $request->input('price'),
         'status' => 0
     ];

     $tariff = $this->repository->store($data);
     if ($tariff){

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
        $request->validate([
            'type_id' => ['required'],
            'title' => ['required'],
        ]);

        $data = [

            'type_id' => $request->input('type_id'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),

        ];

        $tariff = $this->repository->update($id , $data);
        if ($tariff){

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
