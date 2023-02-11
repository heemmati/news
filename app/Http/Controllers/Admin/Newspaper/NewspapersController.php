<?php

namespace App\Http\Controllers\Admin\Newspaper;

use App\Http\Controllers\Admin\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\Base\BaseRepository;
use App\Traits\File\FileHelper;
use App\Traits\Image\ImageHelper;
use App\Repositories\Newspaper\NewspaperRepository;
use App\Traits\Tag\TagHelper;

class NewspapersController extends MainController
{
    use BaseRepository , ImageHelper , FileHelper , TagHelper;
    public function __construct()
    {
        $this->repository = new NewspaperRepository();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'type_id' => ['required']
        ]);

        $data = [
            'creator_id' => auth()->id(),
            'type_id' => $request->input('type_id'),
            'print_date' => $request->input('print_date'),
            'number' => $request->input('number'),
            'status' => 0
        ];

        $newspaper = $this->repository->store($data);

        if ($newspaper) {

            $base = $this->base_create_via_request($request, $newspaper->id, get_class($newspaper));

            $tag = $this->connect_object_tag_via_request($newspaper, $request);




            $default_image = $request->input('image');
            if (isset($default_image)) {
                $this->attach_images($newspaper, [$default_image]);
            }


            $default_file = $request->input('file');
            if (isset($default_file)) {
                $this->attach_files($newspaper, [$default_file]);
            }


            DB::commit();
            toast('انجام شد!', 'success');
            return back();

        }
        else {
            DB::rollBack();
            toast('دقایقی بعد مجددا تلاش کنید!', 'error');
            return back();
        }
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required'],
            'type_id' => ['required']
        ]);

        $data = [
            'creator_id' => auth()->id(),
            'type_id' => $request->input('type_id'),
            'print_date' => $request->input('print_date'),
            'number' => $request->input('number'),
            'status' => 0
        ];

        $newspaper = $this->repository->update($id , $data);

        if ($newspaper) {

            $base_data = [
                'title' => $request->input('title'),
                'entitle' => $request->input('entitle'),
                'description' => $request->input('description'),
                'body' => $request->input('body'),
                'image' => $request->input('image'),
            ];
            $base_rep = new \App\Repositories\Base\BaseRepository();
            $base = $base_rep->update($newspaper->base->id, $base_data);



            $tag = $this->connect_object_tag_via_request($newspaper, $request);




            $default_image = $request->input('image');
            if (isset($default_image)) {
                $this->attach_images($newspaper, [$default_image]);
            }


            $default_file = $request->input('file');
            if (isset($default_file)) {
                $this->attach_files($newspaper, [$default_file]);
            }


            DB::commit();
            toast('انجام شد!', 'success');
            return back();

        }
        else {
            DB::rollBack();
            toast('دقایقی بعد مجددا تلاش کنید!', 'error');
            return back();
        }
    }

}
