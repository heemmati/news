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

use App\Model\Reword\Reword;

use App\Model\Tag\Tag;


use App\Traits\Base\BaseRepository;
use App\Model\News\Article;
use App\Repositories\Tag\TagRepository;
use App\Traits\Tag\TagHelper;


class Rewording implements ShouldQueue
{
    use Dispatchable, 
    InteractsWithQueue, Queueable, SerializesModels , TagHelper , BaseRepository;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $word;
    public $tran;

    public function __construct($word , $tran)
    {
        //
      
        $this->word = $word ;
        $this->tran = $tran ;
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
 $word = $this->word ;
       $tran = $this->tran   ;
    
    $this->rewording($word , $tran);
        
    }
    
    
       public function rewording($word , $tran)
    {
   
   
          

         
                    if (isset($word) && !empty($word) && !empty($tran) && isset($tran)){
                        
                        $test = Reword::create([
                            'word' => $word,
                            'trans' => $tran,
                           'created_at'=> null , 
                           'updated_at'=> null 
                        ]);
                        
                 
if($test instanceof Reword){
    
           $articles = Base::latest()->where('body' , 'like' , '%'.$word.'%')->get();
           foreach ($articles as $article){

  

                               $new_article = str_replace($word , $tran , $article->body);
                               
                    
                                   $article->update([
                                       'body' => $new_article
                                   ]);

                                   $article->save();



        
       }
        
 
}
          

         



      
       
       
                    }

               
    }

  



}
