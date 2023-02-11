<?php

namespace App\Http\Controllers\Admin\Image;

use App\Model\Image\Image;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Traits\Image\ImageRepository;

class ImageController extends Controller
{

    use ImageRepository;


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $filtered = [
            'title' => Request::capture()->get('title') ,
            'entitle' => Request::capture()->get('entitle') ,
            'alt' => Request::capture()->get('alt') ,
            'start_date' => Request::capture()->get('start_date') ,
            'end_date' => Request::capture()->get('end_date') ,
        ];
        $images = $this->filter($filtered);

              return view('module.image.admin.index' , compact('images'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'max:255|string' ,
            'entitle' => 'max:255|string|nullable' ,
            'src' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048' ,
        ]);

        DB::beginTransaction();
        $image = $this->create_image_via_request($request);
        if ($image) {
            DB::commit();
            toast('انجام شد!', 'success');
            return back();
        }
        else{
            DB::rollBack();
            toast('چند ثانیه بعد امتحان کنید!', 'error');
            return back();
        }
    }

    public function edit($id)
    {
        $image = Image::findOrFail($id);
        return view('module.image.admin.edit' , compact('image'));
    }

    public function update(Request $request, $id)
    {
           $request->validate([
            'title' => 'max:255|string' ,
            'entitle' => 'max:255|string' ,
            'alt' => 'max:255|string' ,
        ]);
        DB::beginTransaction();
        $image = $this->update_image_via_request($request , $id);
        if ($image) {
            DB::commit();
            toast('انجام شد!', 'success');
            return back();
        }
        else{
            DB::rollBack();
            toast('چند ثانیه بعد امتحان کنید!', 'error');
            return back();
        }



    }

    public function destroy($id)
    {
        //
        $deleted = $this->delete_image($id);
        if ($deleted) {
            DB::commit();
            toast('انجام شد!', 'success');
            return back();
        } else {
            DB::rollBack();
            toast('با مشکل مواجه شد!', 'error');
            return back();
        }
    }

    public function filemanager()
    {


        $filtered = [
            'title' => Request::capture()->get('title') ,
            'entitle' => Request::capture()->get('entitle') ,
            'alt' => Request::capture()->get('alt') ,
            'start_date' => Request::capture()->get('start_date') ,
            'end_date' => Request::capture()->get('end_date') ,
        ];


        $images = $this->filter($filtered);

        return view('module.image.filemanager.index' , compact('images' , 'filtered'));




    }

    public function filter($data)
    {
        $images = Image::latest()
            ->Title($data['title'])
            ->Entitle($data['entitle'])
            ->Alt($data['alt'])
            ->Start($data['start_date'])
            ->End($data['end_date'])
            ->get();

        return $images;
    }


}
