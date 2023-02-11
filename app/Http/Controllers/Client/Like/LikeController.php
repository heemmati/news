<?php

namespace App\Http\Controllers\Client\Like;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Model\Like\Like;
use App\Repositories\Like\LikeRepository;

class LikeController extends Controller
{

    public $repository;

    public function __construct()
    {
        $this->repository = new LikeRepository();
    }

    public function store(Request $request)
    {

        DB::beginTransaction();
        $request->validate([
            'likeable_id' => ['required'],
            'likeable_type' => ['required'],
        ]);



        $likeable_id = $request->input('likeable_id');
        $likeable_type = $request->input('likeable_type');


        if (!Auth::guest()) {
            $user_id = \auth()->id();
            $exist = like::where('user_id' , $user_id)->where('likeable_id' , $likeable_id)->where('likeable_type' , $likeable_type)->first();
        } else {
            $user_id = null;
            $exist = like::where('ip' , $request->ip())->where('likeable_id' , $likeable_id)->where('likeable_type' , $likeable_type)->first();

        }

        if (isset($exist) && !empty($exist)){
            DB::rollBack();
            toast('رای شما قبلا ثبت شده است!', 'error');
            return back();
        }
        else{

            if (isset($likeable_id) && !empty($likeable_type)) {
                $object = $likeable_type::findOrFail($likeable_id);


                $data = [
                    'user_id' => $user_id,
                    'ip' => $request->ip(),
                    'type' => $request->input('type'),
                    'likeable_id' => $object->id,
                    'likeable_type' => get_class($object)
                ];

                $like = $this->repository->store($data);

                if ($like){
                    DB::commit();
                    toast('انجام شد!', 'success');
                    return back();

                } else {
                    DB::rollBack();
                    toast('دقایقی بعد مجددا تلاش کنید!', 'error');
                    return back();
                }


            } else {
                DB::rollBack();
                toast('دقایقی بعد مجددا تلاش کنید!', 'error');
                return back();
            }

        }


    }
}
