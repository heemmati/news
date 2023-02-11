<?php

namespace App\Http\Controllers\Admin\Podcast;

use App\Payam\PayamFactory;
use App\Review\PodcastReview;
use App\Review\SimpleReport;
use App\Review\VideoReview;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Podcast\Podcast;
use App\Http\Requests\Podcast\PodcastRequest;
use App\Traits\Podcast\PodcastRepository;
use App\Model\Portofolio\Portofolio;

class PodcastController extends Controller
{
    use PodcastRepository , SimpleReport;

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
        $result = $this->get_report(new PodcastReview());
        $podcasts = $result['podcasts'];
        $filtered = $result['filter'];

        return view('module.podcast.admin.index', compact('podcasts' , 'filtered'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('module.podcast.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(PodcastRequest $request)
    {

        DB::beginTransaction();
        try{
            $image = $this->create_podcast_via_request($request);
            if ($image) {
                DB::commit();
                return $this->payam->success();
            } else {
                DB::rollBack();
                return $this->payam->error();
            }
        }
        catch (\Exception $e){
            DB::rollBack();
            report($e);
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
        return view('module.podcast.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $podcast = Podcast::findOrFail($id);
        return view('module.podcast.admin.edit', compact('podcast'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(PodcastRequest $request, $id)
    {

        DB::beginTransaction();
        $podcast = $this->update_podcast_via_request($request, $id);
        if ($podcast) {
            DB::commit();
            return $this->payam->success();
        } else {
            DB::rollBack();
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
        //
        $deleted = $this->delete_podcast($id);
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
        $result = $this->get_report(new PodcastReview());
        $podcasts = $result['podcasts'];
        $filtered = $result['filter'];


        return view('module.podcast.filemanager.index', compact('podcasts' ,'filtered'));
    }
}
