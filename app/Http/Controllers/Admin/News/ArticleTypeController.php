<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Admin\MainController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\News\ArticleType;
use App\Repositories\News\ArticleTypeRepository;

class ArticleTypeController extends MainController
{


    public function __construct()
    {
        $this->repository = new ArticleTypeRepository();
    }

    public function store(Request $request)
    {
        //

        $request->validate([
            'title' => ['required' , 'max:200']
        ]);


        //  Status
        if( !empty($request->input('status'))){

            $status = $request->input('status');
        }
        else{
            $status = 0;
        }

        $data = [
            'title' => $request->input('title'),
            'entitle' => $request->input('entitle'),
            'code' => $request->input('code'),
            'status' => $request->input('status'),
        ];




        $type = $this->repository->store($data);

        if ($type) {
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
        return view('modules.show');
    }

    public function update(Request $request, $id)
    {
        //

        $request->validate([
            'title' => ['required' , 'max:200']
        ]);


        //  Status
        if( !empty($request->input('status'))){

            $status = $request->input('status');
        }
        else{
            $status = 0;
        }



        $data = [
            'title' => $request->input('title'),
            'entitle' => $request->input('entitle'),
            'code' => $request->input('code'),
            'status' => $request->input('status'),
        ];

        $updated = $this->repository->update($id, $data);

        if ($updated) {
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
