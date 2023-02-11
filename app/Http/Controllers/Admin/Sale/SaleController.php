<?php

namespace Modules\Sale\Http\Controllers\Admin;

use App\Http\Controllers\Admin\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Portofolio\Traits\CaseHelper;
use Modules\Portofolio\Traits\Technologyhelper;
use Modules\Sale\Repository\SaleRepository;

class SaleController extends MainController
{

    use CaseHelper , Technologyhelper;
    public function __construct()
    {
        $this->repository = new SaleRepository();
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        $request->validate([
            'name' => ['required'],
            'mobile' => ['required', 'numeric']
        ]);


        $data = [
            'name' => $request->input('name'),
            'mobile' => $request->input('mobile'),
            'phone' => $request->input('phone'),
            'introduction' => $request->input('introduction'),
            'website' => $request->input('website'),
            'price' => $request->input('price'),
            'brand' => $request->input('brand'),
            'activities' => $request->input('activities'),
            'description' => $request->input('description'),
            'status' => 0
        ];

        $sale = $this->repository->store($data);
        if ($sale) {

            $technology = $this->connect_object_technology_via_request($sale , $request);
            $cases = $this->connect_object_case_via_request($sale , $request);

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
            'name' => ['required'],
            'mobile' => ['required', 'numeric']
        ]);


        $data = [
            'name' => $request->input('name'),
            'mobile' => $request->input('mobile'),
            'phone' => $request->input('phone'),
            'introduction' => $request->input('introduction'),
            'website' => $request->input('website'),
            'price' => $request->input('price'),
            'brand' => $request->input('brand'),
            'activities' => $request->input('activities'),
            'description' => $request->input('description'),
            'status' => 0
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
