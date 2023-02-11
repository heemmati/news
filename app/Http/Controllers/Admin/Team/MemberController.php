<?php

namespace Modules\Team\Http\Controllers\Admin;

use App\Http\Controllers\Admin\MainController;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Portofolio\Traits\Technologyhelper;
use Modules\Skill\Repository\SkillRepository;
use Modules\Team\Repository\MemberRepository;

class MemberController extends MainController
{
    use Technologyhelper;

    public function __construct()
    {
        $this->repository = new MemberRepository();
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'team_id' => ['required'] ,
                'name' => ['required'] ,
            ]);

            $data = [
                'team_id' => $request->input('team_id'),
                'user_id' => $request->input('user_id'),
                'name'  => $request->input('name'),
                'post'  => $request->input('post'),
                'email'  => $request->input('email'),
                'mobile'  => $request->input('mobile'),
                'history' => $request->input('history'),
                'description'=> $request->input('description'),
                'status' => 0,
            ];

            $member = $this->repository->store($data);

            if ($member) {


                DB::commit();
                toast('انجام شد!', 'success');
                return back();


            } else {
                DB::rollBack();
                toast('دقایقی بعد مجددا تلاش کنید!', 'error');
                return back();

            }
        } catch (\Exception $exception) {

            DB::rollBack();
            toast($exception->getMessage(), 'error');
            return back();
        }

    }


    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'team_id' => ['required'] ,
                'name' => ['required'] ,
            ]);

            $data = [

                'team_id' => $request->input('team_id'),
                'user_id' => $request->input('user_id'),
                'name'  => $request->input('name'),
                'post'  => $request->input('post'),
                'email'  => $request->input('email'),
                'mobile'  => $request->input('mobile'),
                'history' => $request->input('history'),
                'description'=> $request->input('description'),
                'status' => 0,

            ];

            $member = $this->repository->update($id, $data);

            if ($member) {


                DB::commit();
                toast('انجام شد!', 'success');
                return back();


            } else {
                DB::rollBack();
                toast('دقایقی بعد مجددا تلاش کنید!', 'error');
                return back();

            }
        } catch (\Exception $exception) {

            DB::rollBack();
            toast($exception->getMessage(), 'error');
            return back();
        }
    }
}
