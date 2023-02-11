<?php

namespace App\Http\Controllers\Admin\Tag;
use App\Jobs\Tagging;


use App\Http\Controllers\Admin\MainController;
use App\Traits\Breadcrumb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Base\Base;
use App\Traits\Base\BaseRepository;
use App\Model\News\Article;
use App\Model\Tag\Tag;
use App\Repositories\Tag\TagRepository;
use App\Traits\Tag\TagHelper;

class TagController extends MainController
{
    use Breadcrumb , TagHelper , BaseRepository ;

    public function __construct()
    {
        $this->repository = new TagRepository();
    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        return view('module.tag.show');
    }


    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        $request->validate([
            'title' => ['required'],
        ]);

        $data = [
            'status' => 1
        ];

        $tag = $this->repository->update($id , $data);

        if ($tag){
            $base_data = [
                'title' => $request->input('title'),
                'entitle' => $request->input('entitle'),
                'description' => $request->input('description'),
                'body' => $request->input('body'),
                'image' => $request->input('image'),
            ];
            $base_rep = new \App\Repositories\Base\BaseRepository();
            $base = $base_rep->update($tag->base->id, $base_data);

            DB::commit();
            toast('انجام شد!', 'success');
            return back();

        } else {
            DB::rollBack();
            toast('دقایقی بعد مجددا تلاش کنید!', 'error');
            return back();
        }
    }

    public function automate()
    {

        $breadcrumbs = $this->breadcrumb_generator('tags.automate');
        return view('module.tag.admin.tag.automate' , compact('breadcrumbs'));
    }

    public function automate_store(Request  $request)
    {
       $tags = $request->input('tags');
      
      if(isset($tags)&& !empty($tags)){
           
           $tags_array = explode(",", $tags);

           $tags_ids =array();
           
           
           foreach ($tags_array as $tag){
               $tag_slug = str_replace(' ' , '-' , $tag);
               $tag_exist = Base::where('slug' , $tag_slug)->where('baseable_type' , Tag::class)->first();

               if (!isset($tag_exist) OR empty($tag_exist)) {
                   
                   $tag_insert = $this->create_tag_via_raw(1);
                   if ($tag_insert){
                       $base = $this->base_create_via_raw($tag , $tag_insert);
                   $tag_exist = $tag_insert;
                   }
               }
              
                Tagging::dispatch($tag_exist);
                //$this->tagging($tag_exist);
           
              
           }




        
      
      
       toast('انجام شد!', 'success');
            return back();
      }
     
            
      
    }


  public function tagging($tagged)
    {
   
       

$articles = Article::whereHas('base' , function($q) use ($tagged){
              $q->where('body' , 'like' , '%'.$tagged->title.'%');
           })->get();
           
           
           foreach ($articles as $article){
               
               
               Tagging::dispatch($tagged , $article);
               
               
              



           }

      

    }


}
