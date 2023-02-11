<?php

namespace App\Http\Controllers\Admin\Position;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Position\Position;
use App\Repositories\Position\PositionRepository;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $positions = Position::latest()->get();
        return view('module.position.admin.list', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('module.position.admin.create');
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
        $data = [
            'user_id' => auth()->id(),
            'title' => $request->input('title'),
            'code' => $request->input('code'),
            'limit' => $request->input('limit'),
            'type' => $request->input('type'),
            'status' => 0
        ];
        $position = new PositionRepository();
        $position = $position->store($data);

        if ($position) {
            DB::commit();
            toast('انجام شد!', 'success');
            return back();

        } else {
            DB::rollBack();
        }

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('module.position.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('module.position.edit');
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

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
