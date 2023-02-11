<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Payam\PayamFactory;
use App\Review\GalleryReview;
use App\Review\SimpleReport;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Traits\Base\BaseRepository;
use App\Model\Gallery\Gallery;
use App\Traits\Gallery\GalleryRepository;
use App\Traits\Image\ImageHelper;

class GalleryController extends Controller
{
    use GalleryRepository, BaseRepository, ImageHelper, SimpleReport;

    public $payam;

    public function __construct()
    {

        $message = new PayamFactory();
        $this->payam = $message->go();


    }

    public function index()
    {
        $result = $this->get_report(new GalleryReview());
        $galleries = $result['galleries'];
        $filtered = $result['filter'];


        return view('module.gallery.admin.list', compact('galleries', 'filtered'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('module.gallery.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        DB::beginTransaction();
        try {
            $gallery = $this->create_empty_gallery();
            if ($gallery) {
                $base = $this->base_create_via_request($request, $gallery->id, get_class($gallery));

                $default_image = $request->input('images');

                $this->attach_images($gallery, $default_image);
                DB::commit();

                return $this->payam->success();

            } else {
                DB::rollBack();
                return $this->payam->error();
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            report($exception);
            return $this->payam->error();
        }


    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('module.gallery.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('module.gallery.admin.edit', compact('gallery'));
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
        try {
            $gallery = Gallery::findOrFail($id);


            if (isset($gallery) && !empty($gallery)) {

                $base_data = [
                    'title' => $request->input('title'),
                    'entitle' => $request->input('entitle'),
                    'description' => $request->input('description'),
                    'body' => $request->input('body'),
                    'image' => $request->input('image'),
                ];

                $base_rep = new \App\Repositories\Base\BaseRepository();
                $base = $base_rep->update($gallery->base->id, $base_data);

                $default_image = $request->input('images');
                $this->attach_images($gallery, $default_image);

                DB::commit();

                return $this->payam->success();

            } else {
                DB::rollBack();
                return $this->payam->error();
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            report($exception);
            dd($exception->getMessage());
//            toast($exception->getMessage() , 'error');
            return back();
//            return $this->payam->error();
        }

    }

    public function destroy($id)
    {
        //
        DB::beginTransaction();
        $deleted = $this->delete_gallery($id);
        if ($deleted) {
            DB::commit();
            return $this->payam->success();
        } else {
            DB::rollBack();
            return $this->payam->error();
        }
    }

    public function filemanager()
    {
        $result = $this->get_report(new GalleryReview());
        $galleries = $result['galleries'];
        $filtered = $result['filter'];
        return view('module.gallery.filemanager.index', compact('galleries', 'filtered'));
    }
}
