<?php

namespace App\Http\Controllers\Admin\ContentManagement;

use App\Http\Controllers\Admin\MainController;
use App\Utility\Status;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\ContentManagement\ContentType;
use App\Repositories\Content\ContentTypeRepository;
use App\Model\Shop\Sell;

class ContentTypeController extends MainController
{

    public function __construct()
    {
        $this->repository = new ContentTypeRepository();
    }


    public function store(Request $request)
    {
        DB::beginTransaction();

        $request->validate([
            'title' => 'required',
            'word_count' => 'required',
            'price' => 'required|numeric',
            'commission1' => 'nullable|numeric|min:1|max:100',
            'commission2' => 'nullable|numeric|min:1|max:100',
            'commission3' => 'nullable|numeric|min:1|max:100',

        ]);


        $commission1 = $request->input('commission1');
        $commission2 = $request->input('commission2');
        $commission3 = $request->input('commission3');

        $default_commission = 10;

        if (!isset($commission1) or empty($commission1) or $commission1 > 100 or $commission1 < 0) {
            $commission1 = $default_commission;
        }

        if (!isset($commission2) or empty($commission2) or $commission2 > 100 or $commission2 < 0) {
            $commission2 = $default_commission;
        }

        if (!isset($commission3) or empty($commission3) or $commission3 > 100 or $commission3 < 0) {
            $commission3 = $default_commission;
        }

        $data = [
            'user_id' => auth()->id(),
            'title' => $request->input('title'),
            'word_count' => $request->input('word_count'),
            'image_count' => $request->input('image_count'),
            'commission1' => $request->input('commission1'),
            'commission2' => $request->input('commission2'),
            'commission3' => $request->input('commission3'),
            'status' => 0,
        ];
        $content_type = $this->repository->store($data);

        if ($content_type) {

            $sell_data = [
                'user_id' => auth()->id(),
                'code' => 1,
                'buyCount' => 0,
                'price' => $request->input('price'),
                'stock' => $request->input('stock'),
                'sellable_type' => get_class($content_type),
                'sellable_id' => $content_type->id,
                'status' => 0,
                'unit' => 0

            ];

            $sell = Sell::create($sell_data);

            if ($sell instanceof Sell) {
                DB::commit();
                toast(__('site.done'), 'success');
                return back();
            } else {
                DB::rollBack();
                toast(__('site.failed'), 'error');
                return back();
            }


        } else {
            DB::rollBack();
            toast(__('site.failed'), 'error');
            return back();
        }


    }

    public function update(Request $request, $id)
    {

        DB::beginTransaction();

        $request->validate([
            'title' => 'required',
            'word_count' => 'required',
            'price' => 'required|numeric',
            'commission1' => 'nullable|numeric|min:1|max:100',
            'commission2' => 'nullable|numeric|min:1|max:100',
            'commission3' => 'nullable|numeric|min:1|max:100',

        ]);


        $commission1 = $request->input('commission1');
        $commission2 = $request->input('commission2');
        $commission3 = $request->input('commission3');

        $default_commission = 10;

        if (!isset($commission1) or empty($commission1) or $commission1 > 100 or $commission1 < 0) {
            $commission1 = $default_commission;
        }

        if (!isset($commission2) or empty($commission2) or $commission2 > 100 or $commission2 < 0) {
            $commission2 = $default_commission;
        }

        if (!isset($commission3) or empty($commission3) or $commission3 > 100 or $commission3 < 0) {
            $commission3 = $default_commission;
        }

        $data = [

            'title' => $request->input('title'),
            'word_count' => $request->input('word_count'),
            'image_count' => $request->input('image_count'),
            'commission1' => $request->input('commission1'),
            'commission2' => $request->input('commission2'),
            'commission3' => $request->input('commission3'),
            'status' => 0,
        ];
        $content_type = $this->repository->update($id , $data);

        if ($content_type) {

            $sell = $content_type->sells()->where('user_id', auth()->id())->first();

            $sell_data = [


                'price' => $request->input('price'),
                'stock' => $request->input('stock'),
                'status' => 0,


            ];

            $sell = $sell->update($sell_data);


            if ($sell) {
                DB::commit();
                toast(__('site.done'), 'success');
                return back();
            } else {
                DB::rollBack();
                toast(__('site.failed'), 'error');
                return back();
            }


        } else {
            DB::rollBack();
            toast(__('site.failed'), 'error');
            return back();
        }


    }

    public function shop()
    {

        $types = ContentType::latest()->where('status', 0)->get();
        return view('module.contentmanagement.admin.shop.index', compact('types'));


    }

}
