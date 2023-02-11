<?php

namespace App\Http\Controllers\Admin\Advertisment;

use App\Http\Controllers\Admin\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Advertisment\Repository\AdvertismentRepository;
use App\Traits\Image\ImageHelper;
use App\Traits\Video\VideoHelper;

class AdvertisementController extends MainController
{

    use ImageHelper, VideoHelper;

    public function __construct()
    {
        $this->repository = new AdvertismentRepository();
    }


    public function store(Request $request)
    {
        DB::beginTransaction();
        $request->validate(
            [
                'tariff_id' => ['required'],
                'time' => ['required']
            ]
        );

        $mobile = $request->input('mobile');
        if (!isset($mobile) || empty($mobile)) {
            $mobile = 0;
        } else {
            $mobile = 1;
        }
        $data = [
            'creator_id' => auth()->id(),
            'asor_id' => auth()->id(),
            'tariff_id' => $request->input('tariff_id'),
            'time' => $request->input('time'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'text' => $request->input('text'),
            'body' => $request->input('body'),
            'code' => $request->input('code'),
            'mobile' => $mobile,
            'status' => 0
        ];

        $advertisement = $this->repository->store($data);
        if ($advertisement) {


            $default_image = $request->input('image');
            if (isset($default_image)) {
                $this->attach_images($advertisement, [$default_image]);
            }


            $default_video = $request->input('video');
            if (isset($default_video)) {
                $this->attach_videos($advertisement, [$default_video]);
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


    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        $request->validate(
            [
                'tariff_id' => ['required'],
                'time' => ['required']
            ]
        );


        $mobile = $request->input('mobile');
        if (!isset($mobile) || empty($mobile)) {
            $mobile = 0;
        } else {
            $mobile = 1;
        }

        $data = [

            'tariff_id' => $request->input('tariff_id'),
            'time' => $request->input('time'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'text' => $request->input('text'),
            'body' => $request->input('body'),
            'code' => $request->input('code'),
            'mobile' => $mobile,

        ];

        $advertisement = $this->repository->update($id, $data);
        if ($advertisement) {


            $default_image = $request->input('image');
            if (isset($default_image)) {
                $this->attach_images($advertisement, [$default_image]);
            }


            $default_video = $request->input('video');
            if (isset($default_video)) {
                $this->attach_videos($advertisement, [$default_video]);
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

}
