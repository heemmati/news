<?php

namespace Modules\Portofolio\Http\Controllers\Admin;

use App\Http\Controllers\Admin\MainController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Traits\Base\BaseRepository;
use App\Traits\Category\CategoryHelper;
use App\Traits\File\FileHelper;
use App\Traits\Gallery\GalleryHelper;
use App\Traits\Image\ImageHelper;
use App\Traits\Podcast\PodcastHelper;
use Modules\Portofolio\Repository\PortofolioRepository;
use Modules\Portofolio\Traits\CaseHelper;
use Modules\Portofolio\Traits\Technologyhelper;
use App\Repositories\Position\PositionRepository;
use App\Traits\Tag\TagHelper;
use App\Traits\Video\VideoHelper;

class PortofolioController extends MainController
{
    protected $repository;

    use BaseRepository, Technologyhelper ,CaseHelper , CategoryHelper, TagHelper , ImageHelper , FileHelper , PodcastHelper , VideoHelper , GalleryHelper;

    public function __construct()
    {
        $this->repository = new PortofolioRepository();
    }


    public function store(Request $request)
    {
        //
        DB::beginTransaction();
        $data = [

            'creator_id' => auth()->id(),
            'link' => $request->input('link'),
            'length' => $request->input('length'),
            'tablet_image' => $request->input('tablet_image'),
            'laptop_image' => $request->input('laptop_image'),
            'mobile_image' => $request->input('mobile_image'),
            'customer_comment' => $request->input('customer_comment'),
            'customer_name' => $request->input('customer_name'),
            'customer_mobile' => $request->input('customer_mobile'),
            'workerCount' => $request->input('workerCount'),
            'customer_rate' => $request->input('customer_rate'),
            'done_date' => $request->input('done_date')

        ];

        $portofolio = $this->repository->store($data);

        if ($portofolio) {
            $base = $this->base_create_via_request($request, $portofolio->id, get_class($portofolio));

            $technology = $this->connect_object_technology_via_request($portofolio , $request);
            $cases = $this->connect_object_case_via_request($portofolio , $request);
            $category = $this->connect_object_category_via_request($portofolio, $request);
            $tag = $this->connect_object_tag_via_request($portofolio, $request);


            $default_image = $request->input('image');
            if (isset($default_image)) {
                $this->attach_images($portofolio, [$default_image]);
            }


            $default_video = $request->input('video');
            if (isset($default_video)) {
                $this->attach_videos($portofolio, [$default_video]);
            }


            $default_file = $request->input('file');
            if (isset($default_file)) {
                $this->attach_files($portofolio, [$default_file]);
            }


            $default_file = $request->input('podcast');
            if (isset($default_file)) {
                $this->attach_podcasts($portofolio, [$default_file]);
            }


            $default_file = $request->input('gallery');
            if (isset($default_file)) {
                $this->attach_galleries($portofolio, [$default_file]);
            }


            $position_rep = new PositionRepository();
            $position = $position_rep->store_array($portofolio, $request->input('positions'));


            DB::commit();
            toast('انجام شد!', 'success');
            return back();

        } else {
            DB::rollBack();
            toast('دقایقی بعد مجددا تلاش کنید!', 'error');
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
        return view('portofolio::show');
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
        DB::beginTransaction();
        $data = [
            'link' => $request->input('link'),
            'length' => $request->input('length'),
            'tablet_image' => $request->input('tablet_image'),
            'laptop_image' => $request->input('laptop_image'),
            'mobile_image' => $request->input('mobile_image'),
            'customer_comment' => $request->input('customer_comment'),
            'customer_name' => $request->input('customer_name'),
            'customer_mobile' => $request->input('customer_mobile'),
            'workerCount' => $request->input('workerCount'),
            'customer_rate' => $request->input('customer_rate'),
            'done_date' => $request->input('done_date')
        ];

        $portofolio = $this->repository->update($id, $data);

        if ($portofolio) {

            $base_data = [
                'title' => $request->input('title'),
                'entitle' => $request->input('entitle'),
                'description' => $request->input('description'),
                'body' => $request->input('body'),
                'image' => $request->input('image'),
            ];
            $base_rep = new \App\Repositories\Base\BaseRepository();
            $base = $base_rep->update($portofolio->base->id, $base_data);




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
