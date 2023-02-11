<?php

namespace Modules\Team\Http\Controllers\Admin;

use App\Http\Controllers\Admin\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\Base\BaseRepository;
use App\Traits\File\FileHelper;
use App\Traits\Image\ImageHelper;
use App\Traits\Tag\TagHelper;
use App\Traits\Tag\TagRepository;
use Modules\Team\Repository\TeamRepository;
use App\Traits\Video\VideoHelper;

class TeamController extends MainController
{
    use BaseRepository , TagRepository , TagHelper , ImageHelper , VideoHelper , FileHelper;

    public function __construct()
    {
        $this->repository = new TeamRepository();
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
                    'status' => 0,
            ];

            $team = $this->repository->store($data);

            if ($team) {

                $base = $this->base_create_via_request($request, $team->id, get_class($team));
                $tag = $this->connect_object_tag_via_request($team, $request);



                $default_image = $request->input('image');
                if (isset($default_image)) {
                    $this->attach_images($team, [$default_image]);
                }


                $default_video = $request->input('video');
                if (isset($default_video)) {
                    $this->attach_videos($team, [$default_video]);
                }


                $default_file = $request->input('file');
                if (isset($default_file)) {
                    $this->attach_files($team, [$default_file]);
                }




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
                         'status' => 0,
            ];

            $team = $this->repository->update($id , $data);

            if ($team) {

                $base_data = [
                    'title' => $request->input('title'),
                    'entitle' => $request->input('entitle'),
                    'description' => $request->input('description'),
                    'body' => $request->input('body'),
                    'image' => $request->input('image'),
                ];
                $base_rep = new \App\Repositories\Base\BaseRepository();
                $base = $base_rep->update($team
                    ->base->id, $base_data);


                $tag = $this->connect_object_tag_via_request($team, $request);



                $default_image = $request->input('image');
                if (isset($default_image)) {
                    $this->attach_images($team, [$default_image]);
                }


                $default_video = $request->input('video');
                if (isset($default_video)) {
                    $this->attach_videos($team, [$default_video]);
                }


                $default_file = $request->input('file');
                if (isset($default_file)) {
                    $this->attach_files($team, [$default_file]);
                }




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
