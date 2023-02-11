<?php

namespace Modules\User\Http\Controllers\Admin;

use App\Utility\Acl;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\User\CutCo;

class CutCoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        \App\services\Watch::update_to_watched(auth()->id() , CutCo::class);
        $cutcos = CutCo::latest()->get();
        return view('user::admin.cutco.list' , compact('cutcos'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('user::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
        $cut = CutCo::create([
            'user_id' => auth()->id() ,
        ]);

        if ($cut instanceof CutCo){

            \App\services\Watch::create_watches(true, null ,$cut);


            alert()->success('انجام شد', 'درخواست قطع همکاری با موفقیت انجام شد!');
            return redirect()->back();
        }

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('user::edit');
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

    public function confirm($id)
    {
        if (isset($id) && is_numeric($id)){
            DB::beginTransaction();
           $cut =  CutCo::findOrFail($id);
           $user = $cut->user;
           $cut->update([
               'status' => 1
           ]);
           if ($cut->save()){
               $user->update([
                   'role' => Acl::USER
               ]);
               if ($user->save()){
                   $user->roles()->sync([Acl::USER]);
                   DB::commit();
                   alert()->success('انجام شد', 'کاربر مورد نظر قطع همکاری کرد!');
                   return back();
               }
               else{
                   DB::rollBack();
                   alert()->error('خطا', 'تایید قطع همکاری با شکست مواجه شد!');
                   return back();
               }


           }
           else{
               DB::rollBack();
               alert()->error('خطا', 'تایید قطع همکاری با شکست مواجه شد!');
               return back();
           }
        }
    }
}
