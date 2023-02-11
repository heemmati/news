<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Admin\MainController;
use App\Traits\Breadcrumb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\Base\BaseRepository;
use App\Traits\File\FileHelper;
use App\Traits\Gallery\GalleryHelper;
use App\Traits\Image\ImageHelper;
use App\Model\Page\Page;
use App\Repositories\Page\PageRepository;
use App\Traits\Podcast\PodcastHelper;
use App\Repositories\Position\PositionRepository;
use App\Traits\Tag\TagHelper;
use App\Traits\Video\VideoHelper;

class PageController extends MainController
{
    use BaseRepository , TagHelper , ImageHelper , VideoHelper , PodcastHelper , FileHelper, GalleryHelper , Breadcrumb;
    public function __construct()
    {
        $this->repository = new PageRepository();
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        $status = $request->input('status');
        if (!isset($status) || empty($status)) {
            $status = 0;
        }


        $data = [

            'creator_id' => auth()->id(),
            'status' => $status

        ];

        $page = $this->repository->store($data);

        if ($page) {
            $base = $this->base_create_via_request($request, $page->id, get_class($page));
            $tag = $this->connect_object_tag_via_request($page, $request);


            $default_image = $request->input('image');
            if (isset($default_image)) {
                $this->attach_images($page, [$default_image]);
            }


            $default_video = $request->input('video');
            if (isset($default_video)) {
                $this->attach_videos($page, [$default_video]);
            }


            $default_file = $request->input('file');
            if (isset($default_file)) {
                $this->attach_files($page, [$default_file]);
            }


            $default_file = $request->input('podcast');
            if (isset($default_file)) {
                $this->attach_podcasts($page, [$default_file]);
            }


            $default_file = $request->input('gallery');
            if (isset($default_file)) {
                $this->attach_galleries($page, [$default_file]);
            }


            $position_rep = new PositionRepository();
            $position = $position_rep->store_array($page, $request->input('positions'));


            DB::commit();
            toast(__('site.done'), 'success');
            return back();

        } else {
            DB::rollBack();
            toast(__('site.try_little_more'), 'error');
            return back();
        }
    }


    public function show($id)
    {
        $page = Page::findOrFail($id);

        $breadcrumbs = $this->breadcrumb_generator('pages.show');

        return view('module.page.admin.page.show', compact('page' ,   'breadcrumbs'));
    }


    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        $status = $request->input('status');
        if (!isset($status) || empty($status)) {
            $status = 0;
        }
        $data = [

            'creator_id' => auth()->id(),
            'status' => $status

        ];

        $page = $this->repository->update( $id , $data);

        if ($page) {

            $base_data = [
                'title' => $request->input('title'),
                'entitle' => $request->input('entitle'),
                'description' => $request->input('description'),
                'body' => $request->input('body'),
                'image' => $request->input('image'),

            ];

            $base_rep = new \App\Repositories\Base\BaseRepository();
            $base = $base_rep->update($page->base->id, $base_data);


            $tag = $this->connect_object_tag_via_request($page, $request);


            $position_rep = new PositionRepository();
            $position = $position_rep->store_array($page, $request->input('positions'));





            DB::commit();
            toast(__('site.done'), 'success');
            return back();

        } else {
            DB::rollBack();
            toast(__('site.try_little_more'), 'error');
            return back();
        }
    }

}
