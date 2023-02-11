<?php

namespace Modules\Slider\Http\Controllers\Admin;

use App\Http\Controllers\Admin\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\Image\ImageHelper;
use Modules\Slider\Repository\SliderRepository;

class SliderController extends MainController
{
    use  ImageHelper;

    public function __construct()
    {
        $this->repository = new SliderRepository();
    }

    public function store(Request $request)
    {

        $request->validate([
            'title',
            'image',


        ]);

        $data = [
            'creator_id' => auth()->id(),
            'title' => $request->input('title'),
            'link' => $request->input('link'),
            'description' => $request->input('description'),
            'description2' => $request->input('description2'),
            'status' => 0
        ];

        $slider = $this->repository->store($data);
        if ($slider) {


            $default_image = $request->input('image');
            if (isset($default_image)) {
                $this->attach_images($slider, [$default_image]);
            }


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
            'title',
            'image',


        ]);

        $data = [
            'creator_id' => auth()->id(),
            'title' => $request->input('title'),
            'link' => $request->input('link'),
            'description' => $request->input('description'),
            'description2' => $request->input('description2'),
            'status' => 0
        ];

        $slider = $this->repository->update($id , $data);
        if ($slider) {


            $default_image = $request->input('image');
            if (isset($default_image)) {
                $this->attach_images($slider, [$default_image]);
            }


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
