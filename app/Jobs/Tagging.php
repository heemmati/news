<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Model\Base\Base;


use App\Model\Tag\Tag;


use App\Traits\Base\BaseRepository;
use App\Model\News\Article;
use App\Repositories\Tag\TagRepository;
use App\Traits\Tag\TagHelper;


class Tagging implements ShouldQueue
{
    use Dispatchable, 
    InteractsWithQueue, Queueable, SerializesModels , TagHelper , BaseRepository;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $tags;

    public function __construct($tags)
    {
        //
        $this->tags = $tags ;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        // Create Shipping Data
    $tags = $this->tags;
    
    $this->tagging($tags);
        
    }
    
    
       public function tagging($tagged)
    {
   
       



           $articles = Article::get();
           foreach ($articles as $article){
               
               
               DB::beginTransaction();
                $base = $article->base;
        
                   if (isset($base->body) && !empty($base->body)) {
                       
                      $these_tags =  $article->tags()->get()->pluck('id')->toArray();

                     


                           if(!in_array($tagged->id , $these_tags)){
                               
                               $tagrey  = explode(' ' , $tagged->title);
                               
                               $count = 0;
                               
                               foreach($tagrey as $tr){
                                   
                                   
                                   if(str_contains( $base->body , $tr)){
                                       $count++;
                                   }
                                   
                                   
                               }
                               if($count == count($tagrey)){
                                    $article->tags()->attach([$tagged->id]);
                                    DB::commit();
                               }
                               else{
                                   DB::rollBack();
                               }
                               
                               
                               
                               
                               
                        //       $link_tag = '<a href="'.$tagged->path().'" >'.$tagged->title.'</a>';
                        //       $new_article = str_replace( $tagged->title, $link_tag , $base->body);
                               
                               
                        //       if ($new_article != $base->body) {
                        //           $base->update([
                        //               'body' => $new_article
                        //           ]);

                        //           $base->save();
                        //           $article->tags()->attach([$tagged->id]);
                        //             DB::commit();
                        //       }
                        //         else{
                        //         DB::rollBack();
                        //   }


                           }
                           else{
                                DB::rollBack();
                           }

                       
                   }
                    else{
                                DB::rollBack();
                           }
              



           }

         
      

    }

  



}
