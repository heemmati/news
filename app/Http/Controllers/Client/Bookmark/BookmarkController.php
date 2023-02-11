<?php

namespace Modules\Bookmark\Http\Controllers\Client;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Bookmark\Repository\BookmarkRepository;
use App\Model\Like\bookmark;

class BookmarkController extends Controller
{

    public $repository;

    public function __construct()
    {
        $this->repository = new BookmarkRepository();
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        $user = \auth()->user();
        if (isset($user) && !empty($user)){

            $request->validate([
                'bookmarkable_id' => ['required'],
                'bookmarkable_type' => ['required'],
            ]);

            $bookmarkable_id = $request->input('bookmarkable_id');
            $bookmarkable_type = $request->input('bookmarkable_type');

            $exist = \App\Model\Bookmark\Bookmark::where('user_id' , $user->id)->where('bookmarkable_id' , $bookmarkable_id)->where('bookmarkable_type' , $bookmarkable_type)->first();

            if (isset($exist) && !empty($exist)){
               $exist->delete();
               if ($exist->trashed()){

                   DB::commit();
                   toast('از علاقه مندی ها حذف شد!', 'success');
                   return back();

               } else {
                   DB::rollBack();
                   toast('دقایقی بعد مجددا تلاش کنید!', 'error');
                   return back();
               }
               }

            else{

                if (isset($bookmarkable_id) && !empty($bookmarkable_type)) {
                    $object = $bookmarkable_type::findOrFail($bookmarkable_id);


                    $data = [
                        'user_id' => $user->id,
                        'bookmarkable_id' => $object->id,
                        'bookmarkable_type' => get_class($object)
                    ];

                    $bookmark = $this->repository->store($data);

                    if ($bookmark){
                        DB::commit();
                        toast('به علاقه مندی ها اضافه شد!', 'success');
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
        else{
            DB::rollBack();
            toast('لطفا ابتدا وارد شوید!', 'error');
            return back();
        }

    }


}
