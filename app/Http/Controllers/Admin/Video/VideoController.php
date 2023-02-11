<?php

namespace App\Http\Controllers\Admin\Video;

use App\Payam\PayamFactory;
use App\Review\ReportFactory;
use App\Review\SimpleReport;
use App\Review\VideoReview;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Video\Video;
use App\Http\Requests\Video\VideoRequest;
use App\Traits\Video\VideoRepository;

class VideoController extends Controller
{
    use VideoRepository , SimpleReport;
    public $payam;


    public function __construct()
    {

        $message = new PayamFactory();
        $this->payam = $message->go();


    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $result = $this->get_report(new VideoReview());
        $videos = $result['videos'];
        $filtered = $result['filter'];


        return view('module.video.admin.index', compact('videos', 'filtered'));


    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('module.video.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(VideoRequest $request)
    {
        DB::beginTransaction();


        try {
            $image = $this->create_video_via_request($request);
            if ($image) {
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
        return view('module.video.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('module.video.admin.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(VideoRequest $request, $id)
    {

        DB::beginTransaction();

        try {
            $video = $this->update_video_via_request($request, $id);
            if ($video) {
                DB::commit();

                return $this->payam->success();

            } else {
                DB::rollBack();
                return $this->payam->error();

            }
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            return $this->payam->error();
        }

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $deleted = $this->delete_video($id);
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

        $result = $this->get_report(new VideoReview());
        $videos = $result['videos'];
        $filtered = $result['filter'];


        return view('module.video.filemanager.index', compact('videos', 'filtered'));
    }


}
