<?php

namespace Modules\Menu\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Menu\Repository\MenuItemRepository;

class MenuItemController extends Controller
{

    protected $repository ;

    public function __construct()
    {
        $this->repository = new MenuItemRepository();
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
        DB::beginTransaction();
        $request->validate([
            'menu_id' => ['required'],
            'title' => ['required'],
            'link' => ['required'],
        ]);

        $data = [
            'creator_id' => auth()->id() ,
            'menu_id' => $request->input('menu_id'),
            'title' => $request->input('title'),
            'link' => $request->input('link'),
            'description' => $request->input('description'),
            'place' => $request->input('place'),
            'parent_id' => $request->input('parent_id'),
            'icon' => $request->input('icon'),
            'status' => 0
        ];

        $menu_item = $this->repository->store($data);

        if ($menu_item){
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
        return view('menu::show');
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
            'menu_id' => ['required'],
            'title' => ['required'],
            'link' => ['required'],
        ]);

        $data = [
            'menu_id' => $request->input('menu_id'),
            'title' => $request->input('title'),
            'link' => $request->input('link'),
            'description' => $request->input('description'),
            'place' => $request->input('place'),
            'parent_id' => $request->input('parent_id'),
            'icon' => $request->input('icon'),

        ];

        $menu_item = $this->repository->update($id , $data);

        if ($menu_item){
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
        //
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
