<?php

namespace App\Studio;

use App\Model\Theme\Theme;
use App\Traits\Breadcrumb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\Base\BaseRepository;
use App\Model\Category\Category;
use App\Traits\Category\CategoryRepository;
use App\Traits\Icon\IconHelper;
use App\Traits\Image\ImageHelper;
use App\Model\News\Article;
use App\Model\Position\Position;
use App\Repositories\Position\PositionRepository;

abstract class CategoryStudio
{

    use CategoryRepository , BaseRepository , ImageHelper , IconHelper , Breadcrumb;

    protected $model;


    abstract function __construct();

    public function index()
    {
        $categories = Category::where('type', $this->model)->get();

        return view('module.category.admin.list' , compact('categories'));
    }


    public function create()
    {
        $model = $this->model;
        $categories = Category::where('type', $this->model)->get();
        $positions  = Position::where('type' , Category::class)->latest()->get();
        $themes  = Theme::latest()->get();

        return view('module.category.admin.create' , compact('model' , 'categories' , 'positions' , 'themes'));
    }


    public function store(Request $request)
    {
        DB::beginTransaction();

        $request->validate([
            'title' => ['required'] ,
            'type' => ['required'] ,
        ]);



        $model = $request->input('type');



        $category = $this->create_category_via_request($request , $model);

        if ($category){

            $default_image = $request->input('image');

            if (isset($default_image)) {
                $this->attach_images($category, [$default_image]);
            }


            $position_rep = new PositionRepository();
            $position = $position_rep->store_array($category, $request->input('positions'));

            $themes = $request->input('themes');
if(isset($themes) && !empty($themes)){
    $themes = $category->themes()->sync([$themes]);
}




            $base = $this->base_create_via_request($request , $category->id , get_class($category));

            DB::commit();
            toast('انجام شد!' , 'success');
            return back();

        }
        else{

        }


    }

    public function edit($id)
    {

        $category = Category::findOrFail($id);
        $selected_positions = $category->positions()->get()->pluck('id')->toArray();
        $selected_themes = $category->themes()->get()->pluck('id')->toArray();
        $themes  = Theme::latest()->get();

        $positions  = Position::where('type' , Category::class)->latest()->get();
        $categories = Category::where('type', $this->model)->get();
        return view('module.category.admin.edit' , compact('category' , 'themes','categories'  , 'selected_themes','selected_positions', 'positions'));

    }

    public function update(Request $request , $id){
        $category = Category::findOrFail($id);


        DB::beginTransaction();

        $request->validate([
            'title' => ['required'] ,

        ]);


        if( !empty($request->input('status'))){

            $status = $request->input('status');
        }
        else{
            $status = 0;
        }




       $category_save = $category->update([
        'user_id' => auth()->id() ,
        'order' => $request->input('order') ,
        'parent_id'  => $request->input('parent_id'),
        'icon'  => $request->input('icon'),
        'status' => $status
       ]);



        if ($category->save()){

                       $base_data = [
                'title' => $request->input('title'),
                'entitle' => $request->input('entitle'),
                'description' => $request->input('description'),
                'body' => $request->input('body'),
                'image' => $request->input('image'),
            ];
            $base_rep = new \App\Repositories\Base\BaseRepository();
            $base = $base_rep->update($category->base->id, $base_data);

//
//            $default_image = $request->input('image');
//            $this->attach_images($category, [$default_image]);
//



            $default_icon = $request->input('icon');
            $this->attach_icons($category, [$default_icon]);

            $position_rep = new PositionRepository();
            $position = $position_rep->store_array($category, $request->input('positions'));



            DB::commit();
            toast('انجام شد!' , 'success');
            return back();

        }
        else{

        }




    }


    public function show($id)
    {
        $category = Category::findOrFail($id);

        $breadcrumbs = $this->breadcrumb_generator('categories.show');

        return view('module.category.admin.show', compact('category' ,   'breadcrumbs'));
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        $object = Category::findOrFail($id);
        $object->delete();
        if ($object->trashed()) {
            DB::commit();
            toast('انجام شد!' , 'success');
            return back();
        } else {
            DB::rollBack();
            toast('با خطا مواجه شد!' , 'error');
            return back();
        }
    }

}
