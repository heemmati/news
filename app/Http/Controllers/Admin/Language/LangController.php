<?php

namespace App\Http\Controllers\Admin\Language;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Traits\Image\ImageHelper;
use App\Repositories\Language\LangRepository;

class LangController extends Controller
{
    use ImageHelper;
    protected $repository;

    public function __construct()
    {
        $this->repository = new LangRepository();
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
        //
        $request->validate([
            'title' => ['required'],
            'code' => ['required']
        ]);


        $data = [
            'creator_id' => auth()->id(),
            'title' => $request->input('title'),
            'code' => $request->input('code'),
            'status' => 0
        ];

        $lang = $this->repository->store($data);
        if ($lang){

            $default_image = $request->input('image');
            if (isset($default_image)){
                $this->attach_images($lang , [$default_image]) ;
            }



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
        return view('module.language.show');
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
        $request->validate([
            'title' => ['required'],
            'code' => ['required']
        ]);


        $data = [
            'title' => $request->input('title'),
            'code' => $request->input('code'),

        ];

        $lang = $this->repository->update($id , $data);
        if ($lang){

//            $default_image = $request->input('image');
//            if (isset($default_image)){
//                $this->attach_images($lang , [$default_image]) ;
//            }



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
