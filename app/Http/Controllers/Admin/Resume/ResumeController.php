<?php

namespace Modules\Resume\Http\Controllers\Admin;

use App\Http\Controllers\Admin\MainController;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Traits\File\FileHelper;
use App\Traits\Image\ImageHelper;
use Modules\Resume\Repository\ResumeRepository;

class ResumeController extends MainController
{

    use ImageHelper , FileHelper;

    public function __construct()
    {
        $this->repository = new ResumeRepository();
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
                'post'  => $request->input('post'),
                'where'  => $request->input('where'),
                'description'  => $request->input('description'),
                'status'  => 0 ,
                'start'  => $request->input('start'),
                'end'  => $request->input('end'),
            ];

            $resume = $this->repository->store($data);

            if ($resume) {


                $default_image = $request->input('image');
                if (isset($default_image)) {
                    $this->attach_images($resume, [$default_image]);
                }


                $default_image = $request->input('file');
                if (isset($default_image)) {
                    $this->attach_files($resume, [$default_image]);
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
        catch (\Exception $exception) {

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

                'title' => $request->input('title'),
                'post'  => $request->input('post'),
                'where'  => $request->input('where'),
                'description'  => $request->input('description'),
                 'start'  => $request->input('start'),
                'end'  => $request->input('end'),
            ];

            $resume = $this->repository->update($id , $data);

            if ($resume) {

                $default_image = $request->input('image');
                if (isset($default_image)) {
                    $this->attach_images($resume, [$default_image]);
                }


                $default_image = $request->input('file');
                if (isset($default_image)) {
                    $this->attach_files($resume, [$default_image]);
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
        catch (\Exception $exception) {

            DB::rollBack();
            toast($exception->getMessage(), 'error');
            return back();
        }
    }

}
