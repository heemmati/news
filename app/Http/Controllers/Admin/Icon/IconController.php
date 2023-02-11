<?php

namespace App\Http\Controllers\Admin\Icon;

use App\Payam\PayamFactory;
use App\Review\IconReview;
use App\Review\SimpleReport;
use App\Review\VideoReview;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Icon\Icon;
use App\Traits\Icon\IconRepository;

class IconController extends Controller
{
    use IconRepository , SimpleReport;

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
        $result = $this->get_report(new IconReview());
        $icons = $result['icons'];
        $filtered = $result['filter'];


        return view('module.icon.admin.index', compact('icons' , 'filtered'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('module.icon.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        DB::beginTransaction();
        $icon = $this->create_icon_via_request($request);
        if ($icon) {
            DB::commit();
            return $this->payam->success();
        } else {
            DB::rollBack();
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
        return view('module.icon.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $icon = Icon::findOrFail($id);
        return view('module.icon.admin.edit', compact('icon'));
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
        $icon = $this->update_icon_via_request($request, $id);
        if ($icon) {
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
        $deleted = $this->delete_icon($id);
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

        $result = $this->get_report(new IconReview());
        $icons = $result['icons'];
        $filtered = $result['filter'];


        return view('module.icon.filemanager.index', compact('icons' , 'filtered'));
    }
}
