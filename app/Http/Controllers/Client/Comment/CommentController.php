<?php

namespace Modules\Comment\Http\Controllers\Client;

use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Repositories\Comment\CommentRepository;

class CommentController extends Controller
{

    public $repository ;

    public function __construct()
    {
        $this->repository = new CommentRepository();
    }

    public function store(Request $request)
    {

        DB::beginTransaction();
        $request->validate([
            'commentable_id' => ['required'],
            'commentable_type' => ['required'],
            'body' => ['required'],
        ]);


        if (!Auth::guest()){
            $user = \auth()->user();
            $user_id = $user->id;
            $name = $user->name;
            $email = $user->email;
            $mobile = $user->mobile;
        }
        else{
            $user_id = null;
            $name = $request->input('name');
            $email = $request->input('email');
            $mobile = $request->input('mobile');

        }



        $parent = $request->input('parent_id');
        if (!isset($parent) || empty($parent)){
            $parent = 0;
        }



        $commentable_id =  $request->input('commentable_id');
        $commentable_type =  $request->input('commentable_type');



        if (isset($commentable_id) && !empty($commentable_type)){
            $object = $commentable_type::findOrFail($commentable_id);




            $data = [
                'ip' => $request->ip(),
                'user_id' => $user_id ,
                'name'  => $name,
                'email'  => $email,
                'mobile'  => $mobile,
                'parent_id'  => $parent ,
                'commentable_id'  =>  $object->id,
                'commentable_type'  => get_class($object),
                'body'  => $request->input('body'),
                'status'  => 1
            ];


            $comment = $this->repository->store($data);


            if($comment){
                DB::commit();
                toast('انجام شد!', 'success');
                return back();

            } else {
                DB::rollBack();
                toast('دقایقی بعد مجددا تلاش کنید!', 'error');
                return back();
            }
        }
        else{
            DB::rollBack();
            toast('دقایقی بعد مجددا تلاش کنید!', 'error');
            return back();
        }
    }


}
