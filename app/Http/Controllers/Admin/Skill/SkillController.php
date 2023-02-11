<?php

namespace Modules\Skill\Http\Controllers\Admin;

use App\Http\Controllers\Admin\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Portofolio\Traits\Technologyhelper;
use Modules\Skill\Repository\SkillRepository;

class SkillController extends MainController
{

    use Technologyhelper;

    public function __construct()
    {
        $this->repository = new SkillRepository();
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'title' => ['required']
            ]);

            $data = [
                'creator_id' => auth()->id(),
                'title' => $request->input('title'),
                'entitle' => $request->input('entitle'),
                'history' => $request->input('history'),
                'description' => $request->input('description'),
                'percentage' => $request->input('percentage'),
                'status' => 0,
            ];

            $skill = $this->repository->store($data);

            if ($skill) {

                $technology = $this->connect_object_technology_via_request($skill , $request);



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
                'title' => ['required']
            ]);

            $data = [

                'title' => $request->input('title'),
                'entitle' => $request->input('entitle'),
                'history' => $request->input('history'),
                'description' => $request->input('description'),
                'percentage' => $request->input('percentage'),
            ];

            $skill = $this->repository->update($id, $data);

            if ($skill) {

                $technology = $this->connect_object_technology_via_request($skill , $request);

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
