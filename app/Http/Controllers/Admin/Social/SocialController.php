<?php

namespace Modules\Social\Http\Controllers\Admin;

use App\Http\Controllers\Admin\MainController;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\Icon\IconHelper;
use App\Traits\Image\ImageHelper;
use Modules\Social\Repository\SocialRepository;

class SocialController extends MainController
{

    use ImageHelper, IconHelper;

    public function __construct()
    {
        $this->repository = new SocialRepository();
    }



    public function store(Request $request)
    {
        $request->validate([

            'title' => ['required'],

        ]);

        $data = [
            'creator_id' => auth()->id(),
            'title' => $request->input('title'),
            'entitle' => $request->input('entitle'),
            'description' => $request->input('description'),
            'color' => $request->input('color'),
            'status' => 1
        ];

        $social = $this->repository->store($data);

        if ($social) {

            $default_file = $request->input('icon');

            if (isset($default_file)) {
                $this->attach_icons($social, [$default_file]);
            }


            $default_image = $request->input('image');
            if (isset($default_image)) {
                $this->attach_images($social, [$default_image]);
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
     * @return Renderable
     */
    public function show($id)
    {
        return view('social::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('social::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
