<?php

namespace Modules\Testimonial\Http\Controllers\Admin;

use App\Http\Controllers\Admin\MainController;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Traits\Image\ImageHelper;
use Modules\Testimonial\Repository\TestimonialRepository;

class TestimonialController extends MainController
{
    use ImageHelper;
    public function __construct()
    {
        $this->repository = new TestimonialRepository();
    }

    public function store(Request $request)
    {

        try {
            DB::beginTransaction();
            $request->validate([
                'title' => ['required']
            ]);

            $data = [
                'creator_id' => auth()->id(),
                'title' => $request->input('title'),
                'post' => $request->input('post'),
                'description' => $request->input('description'),
                'status' => 0,
            ];

            $testimonial = $this->repository->store($data);

            if ($testimonial) {


                $default_image = $request->input('image');
                if (isset($default_image)) {
                    $this->attach_images($testimonial, [$default_image]);
                }



                DB::commit();
                toast('انجام شد!', 'success');
                return back();

            } else {
                DB::rollBack();
                toast('دقایقی بعد مجددا تلاش کنید!', 'error');
                return back();

            }
        } catch (\Exception $exception) {

            DB::rollBack();
            toast($exception->getMessage(), 'error');
            return back();
        }


    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'title' => ['required']
            ]);

            $data = [
                'creator_id' => auth()->id(),
                'title' => $request->input('title'),
                'post' => $request->input('post'),
                'description' => $request->input('description'),

            ];

            $testimonial = $this->repository->update($id , $data);

            if ($testimonial) {

                DB::commit();
                toast('انجام شد!', 'success');
                return back();


            } else {
                DB::rollBack();
                toast('دقایقی بعد مجددا تلاش کنید!', 'error');
                return back();

            }
        } catch (\Exception $exception) {

            DB::rollBack();
            toast('دقایقی بعد مجددا تلاش کنید!', 'error');
            return back();
        }

    }
}
