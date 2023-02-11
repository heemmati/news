<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Model\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Shop\Product;

class CommentController extends Controller
{
    //
    public function store(Request $request)
    {
        //

     

            $user = \auth()->user();
            $model = $request->input('commentable_type');
            $id = $request->input('commentable_id');
            $object = $model::findOrFail($id);

            $comment = $object->comments()->create([

                'name'=> $user->name,
                'email'=> $user->email,
                'user_id' => auth()->id() ,
                'body' => $request->input('body') ,
                'status' => 0 ,
                'commentable_id' => $request->input('commentable_id'),
                'commentable_type ' => $request->input('commentable_type')

            ]);

            if($comment instanceof Comment){
                if (get_class($object) == Product::class){
                    $this->increse_count_comment($object);

                }

                \App\services\Watch::create_watches(true, null ,$comment);

                alert()->success('انجام شد', 'دیدگاه جدید با موفقیت ثبت شد!');
                return back();
            }

            else{
                alert()->error('خطا','ثبت دیدگاه با شکست مواجه شد!');
                return back();
            }
        
   

    }

    public function increse_count_comment($object)
    {

        $pre_like =  $object->commentCount;
        $object->update([
            'likeCount' => $pre_like + 1
        ]);
        $object->save();
    }

}
