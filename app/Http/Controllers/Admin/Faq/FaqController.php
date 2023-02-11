<?php

namespace Modules\Faqs\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Traits\Base\BaseRepository;
use Modules\Faqs\Repository\FaqRepository;
use App\Traits\File\FileHelper;
use App\Traits\Gallery\GalleryHelper;
use App\Traits\Image\ImageHelper;
use App\Traits\Podcast\PodcastHelper;
use App\Traits\Video\VideoHelper;


class FaqController extends Controller
{
    protected $repository;

    use BaseRepository , ImageHelper , FileHelper , PodcastHelper , GalleryHelper , VideoHelper;
    public function __construct()
    {
        $this->repository = new FaqRepository();
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return $this->repository->index();
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return $this->repository->create();
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        $request->validate([
            'title'=> 'required' ,
            'body' => 'required'
        ]);

        $data = [
            'creator_id' => auth()->id(),
            'status' => 0
        ];
        $faq = $this->repository->store($data);
        if ($faq) {

            $base = $this->base_create_via_request($request, $faq->id, get_class($faq));

            $default_image = $request->input('image');
            if (isset($default_image)){
                $this->attach_images($faq , [$default_image]) ;
            }


            $default_video = $request->input('video');
            if (isset($default_video)){
                $this->attach_videos($faq , [$default_video]) ;
            }


            $default_file = $request->input('file');
            if (isset($default_file)){
                $this->attach_files($faq , [$default_file]) ;
            }


            $default_file = $request->input('podcast');
            if (isset($default_file)){
                $this->attach_podcasts($faq , [$default_file]) ;
            }



            $default_file = $request->input('gallery');
            if (isset($default_file)){
                $this->attach_galleries($faq , [$default_file]) ;
            }



            DB::commit();
            toast('انجام شد!', 'success');
            return back();
        } else {
            DB::rollBack();
            toast('با مشکل مواجه شد!', 'error');
            return back();
        }

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('faqs::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return $this->repository->edit($id);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        $request->validate([
            'title'=> 'required' ,
            'body' => 'required'
        ]);

        $data = [
            'creator_id' => auth()->id(),
        ];

        $faq = $this->repository->update($id , $data);
        if ($faq) {

            $base_data = [
                'title' => $request->input('title'),
                'entitle' => $request->input('entitle'),
                'description' => $request->input('description'),
                'body' => $request->input('body'),
                'image' => $request->input('image'),
            ];
            $base_rep = new \App\Repositories\Base\BaseRepository();
            $base = $base_rep->update($faq->base->id, $base_data);




            DB::commit();
            toast('انجام شد!', 'success');
            return back();
        } else {
            DB::rollBack();
            toast('با مشکل مواجه شد!', 'error');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        $deleted = $this->repository->destroy($id);
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
}
