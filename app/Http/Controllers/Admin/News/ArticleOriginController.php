<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Admin\MainController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Traits\Base\BaseRepository;
use App\Model\News\ArticleOrigin;
use App\Repositories\News\ArticleOriginRepository;
use App\Traits\Image\ImageHelper;

class ArticleOriginController extends MainController
{
    use BaseRepository, ImageHelper;

    protected $repository;

    public function __construct()
    {
        $this->repository = new ArticleOriginRepository();
    }


    public function store(Request $request)
    {
        //
        $data = ['link' => $request->input('link')];
        $origin = $this->repository->store($data);


        if ($origin) {

            $default_image = $request->input('image');
            $this->attach_images($origin, [$default_image]);


            $base = $this->base_create_via_request($request, $origin->id, get_class($origin));

            DB::commit();
            toast('انجام شد!', 'success');
            return back();
        } else {
            DB::rollBack();
            toast('دقایق بعد تلاش کنید!', 'error');
            return back();
        }
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {


        $data = [
            'link' => $request->input('link')

        ];


        $updated = $this->repository->update($id, $data);

        if ($updated) {


            $default_image = $request->input('image');
            $this->attach_images($updated, [$default_image]);


            if (isset($updated->base) && !empty($updated->base)) {
                $base_data = [
                    'title' => $request->input('title'),
                    'entitle' => $request->input('entitle'),
                    'description' => $request->input('description'),
                    'body' => $request->input('body'),
                    'image' => $request->input('image'),
                ];


                $base_update = $updated->base->update($base_data);

                if ($updated->base->save()) {
                    DB::commit();
                    toast('انجام شد!', 'success');
                    return back();
                } else {
                    DB::rollBack();
                    toast('دقایق بعد تلاش کنید', 'error');
                    return back();
                }
            }
            else {
                DB::rollBack();
                toast('دقایق بعد تلاش کنید', 'error');
                return back();
            }


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
