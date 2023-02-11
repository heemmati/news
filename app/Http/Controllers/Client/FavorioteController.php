<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Model\Favoriote;
use Illuminate\Http\Request;
use App\Utility\Shop\Product;

class FavorioteController extends Controller
{
    //
    public function store(Request $request)
    {
        //

        if (!empty(\auth()->user())){


            $user = \auth()->user();
            $model = $request->input('favorioteable_type');
            $id = $request->input('favorioteable_id');

            $object = $model::findOrFail($id);

            $fav = $object->favoriotes()->where('user_id' , auth()->id())->first();

            if (isset($fav) && !empty($fav) ){
               $this->decrese_like_count($object);
                $deletedCat = $fav->delete();
                if ($fav->trashed()) {
                    toast()->success('انجام شد', 'محصول از علاقه مندی ها حذف شد');
                    return back();
                } else {
                    toast()->error('خطا', 'با خطا مواجه شد');
                    return back();
                }
            }
            else{
                $fav = $object->favoriotes()->create([
                    'user_id' => auth()->id() ,
                    'body' => $request->input('body') ,
                    'status' => 1 ,
                    'favorioteable_id' => $request->input('favorioteable_id'),
                    'favorioteable_type ' => $request->input('favorioteable_type')
                ]);

                if($fav instanceof Favoriote){
                    $this->increase_like_count($object);
                    toast()->success('انجام شد', 'محصول به لیست علاقه مندی های شما اضافه شد');
                    return back();
                }

                else{
                    toast()->error('خطا','با خطا مواجه شد!');
                    return back();
                }
            }

        }
        else{
            alert()->error('خطا','ابتدا وارد شوید');
            return back();
        }

    }

    public function decrese_like_count($object)
    {

        $pre_like =  $object->likeCount;
        $object->update([
            'likeCount' => $pre_like - 1
        ]);
        $object->save();
    }

    public function increase_like_count($object)
    {
        $pre_like =  $object->likeCount;
        $object->update([
            'likeCount' => $pre_like + 1
        ]);
        $object->save();
    }
}
