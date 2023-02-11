<?php

namespace App\Http\Controllers\Admin\File;

use App\Payam\PayamFactory;
use App\Review\FileReview;
use App\Review\SimpleReport;
use App\Review\VideoReview;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\File\File;
use App\Http\Requests\File\FileRequest;
use App\Traits\File\FileRepository;
use App\Http\Controllers\Admin\Image\Image;
use App\Model\Video\Video;

class FileController extends Controller
{
    use FileRepository , SimpleReport;

    public $payam;


    public function __construct()
    {

        $message = new PayamFactory();
        $this->payam = $message->go();


    }

    public function index()
    {
        $result = $this->get_report(new FileReview());
        $files = $result['files'];
        $filtered = $result['filter'];

        return view('module.file.admin.index' , compact('files' , 'filtered'));
    }

    public function create()
    {
        return view('module.file.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(FileRequest $request)
    {


        DB::beginTransaction();

        try{
            $image = $this->create_file_via_request($request);
            if ($image) {
                DB::commit();
                return $this->payam->success();
            }
            else{
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
        return view('module.file.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $file = File::findOrFail($id);
        return view('module.file.admin.edit' , compact('file'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(FileRequest $request, $id)
    {

        DB::beginTransaction();
        $file = $this->update_file_via_request($request , $id);
        if ($file) {
            DB::commit();
            return $this->payam->success();
        }
        else{
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

        $deleted = $this->delete_file($id);
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
        $result = $this->get_report(new FileReview());
        $files = $result['files'];
        $filtered = $result['filter'];
        return view('module.file.filemanager.index' , compact('files' , 'filtered'));

    }
}
