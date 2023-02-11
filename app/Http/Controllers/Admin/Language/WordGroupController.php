<?php

namespace App\Http\Controllers\Admin\Language;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Repositories\Language\WordGroupRepository;

class WordGroupController extends Controller
{
    protected $repository;

    public function __construct()
    {
        $this->repository = new WordGroupRepository();
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

           'name' => ['required'],
            'slug' =>['required'],

        ]);

        $data = [
            'title' => $request->input('title'),
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'status' => 0
        ];

        $word_group = $this->repository->store($data);
        if ($word_group){

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
         DB::beginTransaction();
        $request->validate([

            'name' => ['required'],
            'slug' =>['required'],

        ]);

        $data = [
            'title' => $request->input('title'),
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
             ];

        $word_group = $this->repository->update($id , $data);
        if ($word_group){

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
