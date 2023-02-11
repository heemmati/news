<?php

namespace Modules\Rating\Http\Controllers\Client;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use App\Model\Rating\Rating;
use Modules\Rating\Repository\RatingRepository;

class RatingController extends Controller
{

    public $repository;

    public function __construct()
    {
        $this->repository = new RatingRepository();
    }

    public function store(Request $request)
    {

        DB::beginTransaction();
        $request->validate([
            'ratingable_id' => ['required'],
            'ratingable_type' => ['required'],
        ]);



        $ratingable_id = $request->input('ratingable_id');
        $ratingable_type = $request->input('ratingable_type');


        $rated_value = $request->input('rating');

        if (is_numeric($rated_value)){
            if ($rated_value > 5 || $rated_value < 1){
                $rated_value = 1;
            }

        }
        else{
            $rated_value = 1;
        }


        if (!Auth::guest()) {
            $user_id = \auth()->id();
            $exist = Rating::where('user_id' , $user_id)->where('ratingable_id' , $ratingable_id)->where('ratingable_type' , $ratingable_type)->first();
        } else {
            $user_id = null;
            $exist = Rating::where('ip' , $request->ip())->where('ratingable_id' , $ratingable_id)->where('ratingable_type' , $ratingable_type)->first();

        }




        if (isset($exist) && !empty($exist)){
            DB::rollBack();
            toast('رای شما قبلا ثبت شده است!', 'error');
            return back();
        }
        else{

            if (isset($ratingable_id) && !empty($ratingable_type)) {
                $object = $ratingable_type::findOrFail($ratingable_id);



                $data = [
                    'user_id' => $user_id,
                    'ip' => $request->ip(),
                    'value' => $rated_value,
                    'ratingable_id' => $object->id,
                    'ratingable_type' => get_class($object)
                ];

                $rating = $this->repository->store($data);

                if ($rating){
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
