<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

use App\Model\Base\Base;
use App\Model\Category\Category;
use App\Model\Comment\Comment;
use App\Model\News\Article;
use App\Model\Journal\Journal;
use App\Model\News\ArticleDetail;
use App\Model\Position\Position;
use App\Model\Region\Region;
use App\Model\Search\Search;
use App\Model\Setting\GeneralItem;

use App\Model\Tag\Tag;
use App\Traits\Optimize\Optimize;
use App\Traits\SiteTrait;
use App\Utility\Status;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\services\GoogleTranslate;
use Illuminate\Http\Request;
use Sunra\PhpSimple\HtmlDomParser;
use function simplehtmldom_1_5\file_get_html;
use DomXPath;


class SiteController extends Controller
{
    //
//    use Seo, Ads;

    use SiteTrait, Optimize;

    public function index()
    {



        
      $bignews =  Cache::remember('bignews', 3600, function () {
        $pos1 = Position::select('id')->where('code', 'main_page')->first();
         return $pos1->articles()->select('articles.id', 'articles.status', 'articles.head_title', 'articles.created_at', 'articles.updated_at')
        ->orderBy('articles.updated_at', 'DESC')->take(5)->with(['base' => function ($query) {
                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
            }])->get();
});


        // $journals = Journal::orderBy('updated_at', 'DESC')->take(4)->get();
        
          $importants =  Cache::remember('important', 3600, function () {
        $pos1 = Position::select('id')->where('code', 'important')->first();
        return $pos1->articles()->select('articles.id', 'articles.status', 'articles.head_title', 'articles.created_at', 'articles.updated_at')
        ->orderBy('articles.updated_at', 'DESC')->take(3)->with(['base' => function ($query) {
                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
            }])->get();

});


       
        /**** Important News  ****/


        /**** Special News  ****/
        $position_specific = Cache::remember('position_specific', 3600, function () {
            return Position::select('id')->where('code', 'special')->first();
        });

        $specifics = Cache::remember('specifics', 3600, function () use ($position_specific ) {
            return $position_specific->articles()
            ->select('articles.id', 'articles.status', 'articles.head_title', 'articles.created_at', 'articles.updated_at')->orderBy('articles.updated_at', 'DESC')->where('status', 1)->take(4)->with(['base' => function ($query) {
                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
            }])->get();
        });
        /**** Special News  ****/


        /**** Special News  ****/
        $position_bottom = Cache::remember('position_bottom', 3600, function () {
            return Position::select('id')->where('code', 'bottom')->first();
        });

        $bottoms = Cache::remember('bottoms', 3600, function () use ($position_bottom ) {
            return $position_bottom->articles()
            ->select('articles.id', 'articles.status', 'articles.head_title', 'articles.created_at', 'articles.updated_at')
           ->orderBy('articles.updated_at', 'DESC')->where('status', 1)->take(3)->with(['base' => function ($query) {
                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
            }])->get();
        });
        /**** Special News  ****/


        $latests = Cache::remember('latests', 60, function () {
        return Article::Select('id', 'status', 'head_title', 'created_at', 'updated_at')
        ->orderBy('articles.updated_at', 'DESC')->take(10)
        ->where('status', 1)->with(['base' => function ($query) {
                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
            }])->get();
        });



        /**** Special News  ****/
        $position_report = Cache::remember('position_report', 3600, function () {
            return Position::select('id')->where('code', 'reports')->first();
        });

        $reports = Cache::remember('reports', 3600, function () use ($position_report ) {
            return $position_report
            ->articles()->select('articles.id', 'articles.status', 'articles.head_title', 'articles.created_at', 'articles.updated_at')
            ->orderBy('articles.updated_at', 'DESC')->where('status', 1)->take(4)->with(['base' => function ($query) {
                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
            }])->get();
        });
        /**** Special News  ****/


        /**** Special News  ****/
        $position_note = Cache::remember('position_note', 3600, function () {
            return Position::select('id')->where('code', 'reports')->first();
        });

        $notes = Cache::remember('notes', 3600, function () use ($position_note ) {
            return $position_note->articles()
            ->select('articles.id', 'articles.status', 'articles.head_title', 'articles.created_at', 'articles.updated_at')
            ->orderBy('articles.updated_at', 'DESC')->where('status', 1)->take(4)->with(['base' => function ($query) {
                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
            }])->get();
            
            
            
        });
        
        
        $cattags = Cache::remember('cattags', 3600, function () use ($position_note ) {
            return Tag::inRandomOrder()->take(3)->with(['base' => function ($query) {
                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
            }])->with(['articles' => function($q){
     $q->select('articles.id', 'articles.status', 'articles.head_title', 'articles.created_at', 'articles.updated_at')
     ->where('articles.status', 1)->latest()->take(5)->with(['base' => function ($query) {
                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
            }])->get();
 
  }])->get();
            
            
            
        });
        
        /**** Special News  ****/


     /**** Most Viewd News  ****/
     
     

 $cat1s = Cache::remember('cacat1s', 3600, function ()  {
           $x =  Position::select('id')->where('code', 'cat1')->first();
   return $x->categories()->with(['articles' => function($q){
     $q->select('articles.id', 'articles.status', 'articles.head_title', 'articles.created_at', 'articles.updated_at')->where('articles.status', 1)->latest()->take(5)->with(['base' => function ($query) {
                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
            }])->get();
 
  }])->first();
            
            
        });
 
   $cat2s = Cache::remember('cacat2s', 3600, function ()  {
           $x =  Position::select('id')->where('code', 'cat2')->first();
   return $x->categories()->with(['articles' => function($q){
     $q->select('articles.id', 'articles.status', 'articles.head_title', 'articles.created_at', 'articles.updated_at')->where('articles.status', 1)->latest()->take(5)->with(['base' => function ($query) {
                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
            }])->get();
 
  }])->first();
            
            
        });
 
  


 
 

        
        
        

 $mviews = Cache::remember('mviews', 3600000, function ()  {
          return ArticleDetail::select('article_id' , 'view_count')->orderBy('view_count', 'DESC')->take(4)
          ->with(['article' => function($query){
              $query->select('articles.id', 'articles.status')->where('status', 1)->with(['base' => function ($query) {
                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
            }]);
          }])->get();
        });
        
     
         $mcomments = Cache::remember('mcomments', 3600000, function ()  {
          return ArticleDetail::select('article_id' , 'view_count')->orderBy('comment_count', 'DESC')
          ->with(['article' => function($query){
              $query->select('articles.id', 'articles.status')->where('status', 1)->with(['base' => function ($query) {
                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
            }]);
          }])->take(4)->get();
        });
// 

        return view('site.index', compact(
            'latests',
'mcomments',
            'importants',
            'specifics',
            'bignews',
'mviews',
'cat1s',
'cat2s',
'cattags',
            'bottoms',
           
            'notes',
            'reports'
        ));


    }

    public function blog()
    {
        $news = Article::latest()->where('status', 1)->paginate(30);
        $title = 'آرشیو اخبار';
        return view('site.blog', compact('news', 'title'));


    }
    
    public function about(){
        
         $v = verta();
        $today = $v->format('%B %d، %Y'); // دی 07، 1395
        
        
        $about = [
            'title' => Cache::remember('about_title', 20, function () {
                return GeneralItem::select('id', 'title', 'code', 'value', 'type')
                ->where('code', 'about_title')->with(['images' => function ($query) {
                    $query->select('images.id', 'images.title', 'images.src', 'images.alt')->get();
                }])->first();
            })
            ,
            'description' => Cache::remember('about_desc', 20, function () {
                return GeneralItem::select('id', 'title', 'code', 'value', 'type')
                ->where('code', 'about_desc')->first();
            })
            ,
            'image' => Cache::remember('about_img', 20, function () {
                return GeneralItem::select('id', 'title', 'code', 'value', 'type')
                ->where('code', 'about_img')->first();
            })
            ,
            'body' => Cache::remember('about_body', 20, function () {
                return GeneralItem::select('id', 'title', 'code', 'value', 'type')
                ->where('code', 'about_body')->first();
            })
            ];
        
        return view('site.about' , compact('about' , 'today'));
    }

    public function contact(){
        
         $v = verta();
        $today = $v->format('%B %d، %Y'); // دی 07، 1395
        
        
        $contact = [
            'title' => Cache::remember('contact_title', 20, function () {
                return GeneralItem::select('id', 'title', 'code', 'value', 'type')
                ->where('code', 'contact_title')->with(['images' => function ($query) {
                    $query->select('images.id', 'images.title', 'images.src', 'images.alt')->get();
                }])->first();
            })
            ,
            'description' => Cache::remember('contact_desc', 20, function () {
                return GeneralItem::select('id', 'title', 'code', 'value', 'type')
                ->where('code', 'contact_desc')->first();
            })
            ,
            'image' => Cache::remember('contact_img', 20, function () {
                return GeneralItem::select('id', 'title', 'code', 'value', 'type')
                ->where('code', 'contact_img')->first();
            })
            ,
            'body' => Cache::remember('contact_body', 20, function () {
                return GeneralItem::select('id', 'title', 'code', 'value', 'type')
                ->where('code', 'contact_body')->first();
            })
            ];
        
        return view('site.contact' , compact('contact' , 'today'));
    }
    public function slugger($slug = null)
    {
        
         $request = Request::capture();
         


        $base = Cache::remember('base' . '_' . $slug, 0, function () use ($slug) {
            return Base::select('id', 'slug', 'short' ,'title', 'baseable_id', 'image' , 'baseable_type')->where('slug', $slug)->first();
        });

        $base2 = Cache::remember('base' . '_' . $slug, 0, function () use ($slug) {
            return Base::select('id', 'slug', 'short', 'title', 'baseable_id', 'image' , 'baseable_type')->where('short', $slug)->first();
        });


        if (isset($base) && !empty($base)) {

            $this->page_seo($base->title, $base->description, URL::current(), URL::current(), 'articles', '', '');


            if ($base->baseable_type == Article::class) {
              
              
              return $this->articlePage($base);

            }
             else if ($base->baseable_type == Journal::class) {
                $journal = $base->baseable;
                if (isset($journal) && !empty($journal)) {
                    $journals = Journal::latest()->where('status', 1)->get();
                   
               
                    return view('site.journal', compact(
                                'journals' ,
                                'journal' 
                        ));

                } else {
                    abort(404);
                }

            }
            else if ($base->baseable_type == Page::class) {


                $page = $base->baseable()->where('status', 1)->first();

                if (isset($page) && !empty($page)) {
                    $tags = Tag::latest()->where('status', 1)->get();

                    $most_commented = ArticleDetail::orderBy('comment_count', 'DESC')->with('article')->get()->take(10);

                    $top_comments = Comment::where('commentable_type', Page::class)->get()->take(10);
                    $specific_news = $this->get_specific();


                    return view('site.page', compact('page', 'most_commented', 'tags', 'specific_news'));
                } else {
                    abort(404);
                }

            } elseif ($base->baseable_type == Tag::class) {
                return $this->tagPage($base);
            } elseif ($base->baseable_type == Category::class) {

                return $this->categoryPage($base);

            } elseif ($base->baseable_type == Region::class) {


                $region =  Cache::remember('region'.'_'.$base->id, 60, function () use ($base) {
                    return $base->baseable()->select('id' , 'type')->first();
                });



                $video_cat = Cache::remember('video_cat', 60, function () {
                    return Base::select('id', 'slug', 'title', 'baseable_type', 'baseable_id')->where('slug', 'ذره-بین')->first();
                });



                if (isset($region) && !empty($region)) {


                    $iran_cat  = true;


                    /**** Big News  ****/
                    $position_big = Cache::remember('position_big', 60, function () {
                        return Position::select('id')->where('code', 'big_main')->first();
                    });

                    $bignews = Cache::remember('bignews' . '_' . $region->id, 60, function () use ($position_big, $region) {
                        return $position_big->articles()->select('articles.id', 'articles.status', 'articles.head_title', 'articles.created_at','articles.updated_at')->orderBy('articles.updated_at' , 'DESC')->where('status', 1)->take(5)->with(['base' => function ($query) {
                            $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description')->get();
                        }])->with(['images' => function ($query) {
                            $query->select('images.id', 'images.title', 'images.src', 'images.alt')->get();
                        }])->whereHas('regions', function ($q) use ($region) {
                            $q->where('regions.id', $region->id);
                        })->get();
                    });
                    /**** Big News  ****/



                    /**** Important News  ****/
                    $position_important = Cache::remember('position_important', 60, function () {
                        return Position::select('id')->where('code', 'important')->first();
                    });

                    $importants = Cache::remember('importants' . '_' . $region->id, 60, function () use ($position_important, $region) {
                        return $position_important->articles()->select('articles.id', 'articles.status', 'articles.head_title', 'articles.created_at','articles.updated_at')->orderBy('articles.updated_at' , 'DESC')->where('status', 1)->take(12)->with(['base' => function ($query) {
                            $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description')->get();
                        }])->with(['images' => function ($query) {
                            $query->select('images.id', 'images.title', 'images.src', 'images.alt')->get();
                        }])->whereHas('regions', function ($q) use ($region) {
                            $q->where('regions.id', $region->id);
                        })->get();
                    });
                    /**** Important News  ****/



                    /**** Special News  ****/
                    $position_specific = Cache::remember('position_specific', 60, function () {
                        return Position::select('id')->where('code', 'special')->first();
                    });

                    $specifics = Cache::remember('specifics' . '_' . $region->id, 60, function () use ($position_specific, $region) {
                        return $position_specific->articles()->select('articles.id', 'articles.status', 'articles.head_title', 'articles.created_at','articles.updated_at')->orderBy('articles.updated_at' , 'DESC')->where('status', 1)->take(4)->with(['base' => function ($query) {
                            $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description')->get();
                        }])->with(['images' => function ($query) {
                            $query->select('images.id', 'images.title', 'images.src', 'images.alt')->get();
                        }])->whereHas('regions', function ($q) use ($region) {
                            $q->where('regions.id', $region->id);
                        })->get();
                    });
                    /**** Special News  ****/


                    /**** Special News  ****/
                    $position_bottom = Cache::remember('position_bottom', 60, function () {
                        return Position::select('id')->where('code', 'bottom')->first();
                    });

                    $bottoms = Cache::remember('bottoms' . '_' . $region->id, 60, function () use ($position_bottom, $region) {
                        return $position_bottom->articles()->select('articles.id', 'articles.status', 'articles.head_title', 'articles.created_at','articles.updated_at')->orderBy('articles.updated_at' , 'DESC')->where('status', 1)->take(15)->with(['base' => function ($query) {
                            $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description')->get();
                        }])->with(['images' => function ($query) {
                            $query->select('images.id', 'images.title', 'images.src', 'images.alt')->get();
                        }])->whereHas('regions', function ($q) use ($region) {
                            $q->where('regions.id', $region->id);
                        })->get();
                    });
                    /**** Special News  ****/


                    // $latests = Cache::remember('latests' . '_' . $region->id, 60, function () use ($region) {
                    //     return Article::Select('id', 'status', 'head_title', 'created_at','updated_at')->take(22)->orderBy('created_at' , 'DESC')->where('status', 1)->with(['base' => function ($query) {
                    //         $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description')->get();
                    //     }])->with(['images' => function ($query) {
                    //         $query->select('images.id', 'images.title', 'images.src', 'images.alt')->get();
                    //     }])->whereHas('regions', function ($q) use ($region) {
                    //         $q->where('regions.id', $region->id);
                    //     })->get();
                    // });


 $latests = Cache::remember('latests', 60, function () {
        return Article::Select('id', 'status', 'head_title', 'created_at', 'updated_at')->take(35)->orderBy('articles.updated_at', 'DESC')->where('status', 1)->with(['base' => function ($query) {
                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description')->get();
            }])->with(['images' => function ($query) {
                $query->select('images.id', 'images.title', 'images.src', 'images.alt')->get();
            }])->get();
        });




                    /**** Special News  ****/
                    $position_note = Cache::remember('position_note', 60, function () {
                        return Position::select('id')->where('code', 'reports')->first();
                    });

                    $notes = Cache::remember('notes' . '_' . $region->id, 60, function () use ($position_note, $region) {
                        return $position_note->articles()->select('articles.id', 'articles.status', 'articles.head_title', 'articles.created_at','articles.updated_at')->latest('articles.updated_at' , 'DESC')->where('status', 1)->take(4)->with(['base' => function ($query) {
                            $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description')->get();
                        }])->with(['images' => function ($query) {
                            $query->select('images.id', 'images.title', 'images.src', 'images.alt')->get();
                        }])->whereHas('regions', function ($q) use ($region) {
                            $q->where('regions.id', $region->id);
                        })->get();
                    });
                    /**** Special News  ****/


                    /**** Special News  ****/
                    $position_report = Cache::remember('position_report', 60, function () {
                        return Position::select('id')->where('code', 'reports')->first();
                    });

                    $reports = Cache::remember('reports' . '_' . $region->id, 60, function () use ($position_report, $region) {
                        return $position_report->articles()->select('articles.id', 'articles.status', 'articles.head_title', 'articles.created_at', 'articles.updated_at')->latest('articles.updated_at' ,  'DESC')->where('status', 1)->take(4)->with(['base' => function ($query) {
                            $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description')->get();
                        }])->with(['images' => function ($query) {
                            $query->select('images.id', 'images.title', 'images.src', 'images.alt')->get();
                        }])->whereHas('regions', function ($q) use ($region) {
                            $q->where('regions.id', $region->id);
                        })->get();
                    });
                    /**** Special News  ****/


                    $regions = Cache::remember('regions', 60, function () {
                        return Region::select('id')->orderBy('created_at' , 'ASC')->where('status', 1)->with(['base' => function ($query) {
                            $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description')->get();
                        }])->with(['images' => function ($query) {
                            $query->select('images.id', 'images.title', 'images.src', 'images.alt')->get();
                        }])->get();
                    });





                    $category = $region;
                    return view('site.category', compact('category', 'iran_cat', 'regions', 'video_cat', 'bignews', 'latests', 'notes', 'reports', 'bottoms', 'specifics', 'importants'));

                } else {
                    abort(404);
                }

            }

        } else if (isset($base2) && !empty($base2)) {
            return redirect($base2->baseable->path() , 301);
        } else {
            abort(404);
        }


    }

    public function portofolios()
    {
        $portofolios = Portofolio::latest()->get();
        $categories = Category::latest()->where('type', Portofolio::class)->get();
        return view('site.projects', compact('portofolios', 'categories'));
    }


    public function translate(){
       
       $article = Article::findOrFail(239);
       echo '<a href="'.$article->path().'">'.$article->path().'</a>';
  
$text 			= $article->body;
$source 		= 'fa';
$target 		= 'az';

$translation 	= GoogleTranslate::translate($source, $target, $text);

$source 		= 'az';
$target 		= 'ku';

$translation 	= GoogleTranslate::translate($source, $target, $translation);

$source 		= 'ku';
$target 		= 'fa';


$translation 	= GoogleTranslate::translate($source, $target, $translation);

$base = $article->base;
$base->update([
    'body' => $translation
    ]);

$base->save();

echo '<pre>';
print_r($translation);
echo '</pre>';



    }
    
    public function search()
    {

        $search = Request::capture()->get('search');

        $news = Base::where('slug', 'like', '%' . $search . '%')->where('baseable_type', Article::class)->whereHasMorph('baseable', [Article::class], function ($q) {
            $q->where('status', 1);
        })->get();


        if (isset($search) && !empty($search)) {

            $exist = Search::where('search', $search)->first();
            if (isset($exist) && !empty($exist)) {
                $exist->update([
                    'count' => $exist + 1
                ]);
                $exist->save();
            } else {


            }

            $title = 'جستجو کلمه :' . $search;


            return view('site.search',
                compact(
                    'news',
                    'title'
                ));

        } else {
            return redirect()->route('site.blog');
        }
    }


    public function sitemap()
    {

        $sitemap = fopen("sitemap.xml", "w");
        $articles = Article::latest()->get();
        $header = '<?xml version="1.0" encoding="UTF-8"?>
                    <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        $body = '';

        foreach ($articles as $article) {
            $body = $body .
                '<url >
      <loc >' . url($article->path()) . '</loc>
      <lastmod > ' . $article->created_at . '</lastmod >
      <changefreq > monthly</changefreq >
      <priority > 0.8</priority >
             </url >';
        }
        $footer = '</urlset >';


        $sitemap_content = $header . $body . $footer;
        fwrite($sitemap, $sitemap_content);
        fclose($sitemap);

    }

    public function rss_generator()
    {

        $sitemap = fopen("rss.xml", "w");

        $articles = Article::latest()->get();

        $header = '<?xml version="1.0" encoding="UTF-8" ?>
                    <rss version="2.0">
                    <channel>';
        $body = '';
        foreach ($articles as $article) {
            $body = $body .
                '<item>
    <title>' . $article->title . '</title>
    <link>' . url($article->path()) . '</link>
    <description>' . $article->description . '</description>
  </item>';
        }
        $footer = '</channel>
</rss>';

        $sitemap_content = $header . $body . $footer;
        fwrite($sitemap, $sitemap_content);
        fclose($sitemap);


    }
    
    public function loader(){
        
  
        $sites = [ 'https://vazeh.com/allfeed.rss' => 3 , 'https://lores.ir/feed/' => 4  ];
        
        $this->rss_array_to_print($sites);
            

          $articles = Article::select('id','created_at')->with(['base' => function ($query) {
                            $query->select('id', 'title', 'baseable_type', 'baseable_id',  'slug')->get();
                        }])->latest()->take(7)->get();
        foreach($articles as $article){
        $this->item_print( $article->path() , $article->title);
            
        

        }
 
            

        
    }
    
    
     public function DOMinnerHTML($element)
    {
        $innerHTML = "";
        $children = $element->childNodes;

        foreach ($children as $child) {
            $innerHTML .= $element->ownerDocument->saveHTML($child);
        }

        return $innerHTML;
    }
    
    
    public function print_from_items($items , $count = 90){
        if (isset($items) && !empty($items) && count($items) > 0) {

                foreach ($items as $key => $item) {
                    if($key <= $count){
                           $title = $item->getElementsByTagName('title');
                    $title = $this->DOMinnerHTML($title[0]);
                    
                    
                    $links = $item->getElementsByTagName('link');
                    $link = $links[0]->nextSibling->data;
                    $link = trim($link);
                    
                    $this->item_print( $link , $title);
                  
                    }
                 

                }


            }
    } 
    
    public function get_items_from_rss($rss){
         $opts = array('http' => array('header' => "User-Agent:MyAgent/1.0\r\n"));
        $context = stream_context_create($opts);


        $vazeh = file_get_contents($rss , FALSE, $context );
        
            $vazeh = html_entity_decode($vazeh);
            $doc = new \DOMDocument('1.0', 'UTF-8');
            @$doc->loadHTML($vazeh);
            $items = $doc->getElementsByTagName('item');
            
            return $items;
    }
    
    public function rss_array_to_print($sites){
        foreach($sites as $site =>  $count){
            $items = $this->get_items_from_rss($site);
         
            $this->print_from_items($items , $count);
        }
    }
    
    public function item_print($link , $title){
        
        $title = str_replace('\n' , '', trim($title));
        echo "document.write('";
        echo '<a style="text-align: justify;color: black;font-weight: 80;border-bottom: 1px solid #eeee;padding-bottom: 6px;margin-bottom: 5px;display: block;text-decoration: none;padding: 8px;" href="'.$link.'">'.$title.'</a>';
    echo "');";
    echo "\n";
    
    
    }
    
      public function get_web_page($url)
    {
        header("Content-Type: text/html; charset=utf-8");
        $user_agent = 'Mozilla/5.0 (Windows NT 6.1; rv:8.0) Gecko/2010101 Firefox/8.0';

        $options = array(

            CURLOPT_CUSTOMREQUEST => "GET",        //set request type post or get
            CURLOPT_POST => false,        //set to GET
            CURLOPT_USERAGENT => $user_agent, //set user agent
            CURLOPT_COOKIEFILE => "cookie.txt", //set cookie file
            CURLOPT_COOKIEJAR => "cookie.txt", //set cookie jar
            CURLOPT_RETURNTRANSFER => true,     // return web page
            CURLOPT_HEADER => false,    // don't return headers
            CURLOPT_HTTPHEADER, array(
                "Authorization: Basic ZGFpbHlvcmRlcnM6ZHVtbf4fsww=",
                "Content-Type: application/json"
            ),
            CURLOPT_FOLLOWLOCATION => true,     // follow redirects
            CURLOPT_ENCODING => "",       // handle all encodings
            CURLOPT_AUTOREFERER => true,     // set referer on redirect
            CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
            CURLOPT_TIMEOUT => 120,      // timeout on response
            CURLOPT_MAXREDIRS => 10,       // stop after 10 redirects
        );

        $ch = curl_init($url);
        curl_setopt_array($ch, $options);


        $content = curl_exec($ch);
        $err = curl_errno($ch);
        $errmsg = curl_error($ch);
        $header = curl_getinfo($ch);
        curl_close($ch);

        $header['errno'] = $err;
        $header['errmsg'] = $errmsg;
        $header['content'] = $content;
        return $header;
    }
    
    
    public function articlePage($base){
          
                $article =  Cache::remember('article' . '_' . $base->id, 3600, function () use ($base) {
            return  $base->baseable()->Select('id', 'code' ,'status', 'head_title', 'created_at', 'updated_at')->with(['base' => function ($query) {
                $query->select('id', 'title', 'baseable_type', 'short' ,'baseable_id', 'image', 'body' , 'slug', 'description');
            }])->with(['boolean' => function ($query) {
                $query->select('id', 'comments', 'view_count')->get();
            }])->with(['videos' => function ($query) {
                $query->select('videos.id', 'src')->get();
            }])->with(['categories' => function ($query) {
                $query->select('categories.id')->with(['base' => function ($query4) {
                $query4->select('bases.id', 'title', 'baseable_type', 'baseable_id', 'slug');
            }])->get();
            }])->with(['tags' => function ($query) {
                $query->select('tags.id')->with(['base' => function ($query4) {
                $query4->select('bases.id', 'title', 'baseable_type', 'baseable_id', 'slug');
            }])->get();
            }])->first();
        });
        
       
                if (isset($article) && !empty($article)) {
                    
                    $comments = Cache::remember('comments' . '_' . $article->id , 3600, function () use($article) {
                               return $article->comments()->where('parent_id', 0)->where('status', 1)->get();
                     });
                     
                     

 $most_viewed = Cache::remember('mviews', 3600, function ()  {
          return ArticleDetail::select('article_id' , 'view_count')->orderBy('view_count', 'DESC')
          ->with(['article' => function($query){
              $query->select('articles.id', 'articles.status')->where('status', 1)->with(['base' => function ($query) {
                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
            }]);
          }])->take(50)->get();
        });
        
                    
                     $latests = Cache::remember('latests', 60, function () {
        return Article::Select('id', 'status', 'head_title', 'created_at', 'updated_at')->take(40)->orderBy('articles.updated_at', 'DESC')->where('status', 1)->with(['base' => function ($query) {
                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
            }])->get();
        });
        
                    

                    $adetail = $article->details;
               
                           $adetail->update([
                       'view_count' => $adetail->view_count + 1 
                        ]);
                        $adetail->save();
                  
                 
                      $view =    $adetail->view_count;
                      
           

          
                    
                    
                    
                    
                    $tag_ids = Cache::remember('tag_ids'.'_'.$article->id, 3600, function () use($article) {
                          return $article->tags()->select('tags.id')->get()->pluck('id')->toArray();
                     });
$fcat = $article->categories()->first();
        $similars = Cache::remember('similars'.'_'.$fcat, 3600, function () use($fcat) {
            

                          return    $fcat->articles()->select('articles.id', 'articles.status', 'articles.head_title', 'articles.created_at', 'articles.updated_at')
                          ->where('articles.status' , 1)->with(['base' => function ($query) {
                $query->select('bases.id', 'bases.title', 'bases.baseable_type', 'bases.baseable_id', 'bases.image' , 'bases.slug', 'bases.description');
            }])->inRandomOrder()->take(15)->get();
                     });
                  



  $similars_tags = Cache::remember('similars_tags'.'_'.$article->id, 3600, function () use($article) {
                          return   $article->tags()->with(['articles' => function($query2)use($article){
                              $query2->select('articles.id', 'articles.status', 'articles.head_title', 'articles.created_at', 'articles.updated_at')
                          ->where('articles.status' , 1)->where('articles.id' , '<>' , $article->id)->with(['base' => function ($query) {
                $query->select('bases.id', 'bases.title', 'bases.baseable_type', 'bases.baseable_id', 'bases.image' , 'bases.slug', 'bases.description');
            }])->inRandomOrder()->take(4)->get();
                          }])->inRandomOrder()->first();
                          
 
                    

                     });
                       $content = $this->generateContent($article->body , $similars_tags);
        
        
                    return view('site.article', compact('article','most_viewed','content','view', 'latests' ,'similars_tags', 'similars',   'comments'));

                } 
                else {
                    abort(404);
                }
    }
    
    public function categoryPage($base){
             $category =  Cache::remember('category'.'_'.$base->id, 60, function () use ($base) {
                    return $base->baseable()->select('id' , 'type')->first();
                });



              

                if (isset($category) && !empty($category)) {
                    if ($category->type == Article::class) {






                        $bignews = Cache::remember('bignews'.'_'.$category->id, 3600, function () use ($category) {
                    return $category->articles()
                            ->select('articles.id', 'articles.status', 'articles.isbig' ,'articles.head_title', 'articles.created_at', 'articles.updated_at')->where('articles.isbig', 1)
                            ->orderBy('articles.updated_at' , 'DESC')->where('articles.status', 1)->take(5)->with(['base' => function ($query) {
                                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
                            }])->get();
                });




 $importants = Cache::remember('importants'.'_'.$category->id, 3600, function () use ($category) {
                    return $category->articles()
                            ->select('articles.id', 'articles.status', 'articles.isimpo' ,'articles.head_title', 'articles.created_at', 'articles.updated_at')
                            ->where('articles.isimpo', 1)
                            ->orderBy('articles.updated_at' , 'DESC')->where('articles.status', 1)->take(3)->with(['base' => function ($query) {
                                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
                            }])->get();
                });
                

                        $specifics = Cache::remember('specifics'.'_'.$category->id, 3600, function () use ($category) {
                    return $category->articles()
                            ->select('articles.id', 'articles.status', 'articles.isspe' ,'articles.head_title', 'articles.created_at', 'articles.updated_at')
                            ->where('articles.isspe', 1)->where('articles.status', 1)
                            ->orderBy('articles.updated_at' , 'DESC')->take(5)->with(['base' => function ($query) {
                                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
                            }])->get();
                });
                


                


                        $latests = Cache::remember('latests'.'_'.$category->id, 60, function () use ($category) {
                    return $category->articles()
                        ->select('articles.id', 'articles.status', 'articles.head_title', 'articles.created_at','articles.updated_at')
                        ->take(30)->orderBy('created_at' , 'DESC')->where('status', 1)
                        ->with(['base' => function ($query) {
                                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
                            }])->get();
                });
                


                            
                            
                            $notes = Cache::remember('notes'.'_'.$category->id, 3600, function () use ($category) {
                    return $category->articles()
                            ->select('articles.id', 'articles.status', 'articles.isnote' ,'articles.head_title', 'articles.created_at', 'articles.updated_at')
                            ->where('articles.isnote', 1)
                            ->orderBy('articles.updated_at' , 'DESC')->where('articles.status', 1)->take(5)->with(['base' => function ($query) {
                                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
                            }])->get();
                });
                


                         $reports = Cache::remember('reports'.'_'.$category->id, 3600, function () use ($category) {
                    return $category->articles()
                                                    ->select('articles.id', 'articles.status', 'articles.isrep' ,'articles.head_title', 'articles.created_at', 'articles.updated_at')
                                                    ->where('articles.isrep', 1)
                                                    ->orderBy('articles.updated_at' , 'DESC')->where('articles.status', 1)->take(5)->with(['base' => function ($query) {
                                                        $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
                                                    }])->get();
                });
                
                                                    
                                                       $bottoms = Cache::remember('bottoms'.'_'.$category->id, 3600, function () use ($category) {
                    return $category->articles()
                                                    ->select('articles.id', 'articles.status', 'articles.isbot' ,'articles.head_title', 'articles.created_at', 'articles.updated_at')
                                                    ->where('articles.isbot', 1)
                                                    ->orderBy('articles.updated_at' , 'DESC')->where('articles.status', 1)->take(5)->with(['base' => function ($query) {
                                                        $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
                                                    }])->get();
                });
                
                


    


                  



        
        
        $mviews = Cache::remember('mviews'.'_'.$category->id, 3600, function () use ($category) {
                    return $category->articles()
        ->select('articles.id', 'articles.status' , 'articles.created_at' , 'article_details.article_id' , 'article_details.view_count')
        ->join('article_details', 'articles.id', '=', 'article_details.article_id')
        ->orderBy('article_details.view_count' , 'DESC')->take(10)->with(['base' => function ($query) {
                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
            }])->get();
                });
                
        
        
         $mcomments = Cache::remember('mcomments'.'_'.$category->id, 3600, function () use ($category) {
                    return $category->articles()
        ->select('articles.id', 'articles.status' , 'articles.created_at' , 'article_details.article_id' , 'article_details.comment_count')
        ->join('article_details', 'articles.id', '=', 'article_details.article_id')
        ->orderBy('article_details.comment_count' , 'DESC')->take(10)->with(['base' => function ($query) {
                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
            }])->get();
                });
                
        



                        return view('site.category', compact('category', 'mviews' ,'bottoms',
                        'mcomments', 'bignews', 'latests', 'notes', 'reports', 'specifics', 'importants'));
                    }
                } else {
                    abort(404);
                }
    }
    
    public function tagPage($base){
        
                $tag =  Cache::remember('tag' . '_' . $base->id, 0, function () use ($base) {
            return $base->baseable()->with(['base' => function ($query) {
                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
            }])->first();
        });



         
                
                           $tag->update([
                    'view' => $tag->view + 1
                    ]);
                    $tag->save();
              
                        
                
               
                if (isset($tag) && !empty($tag)) {
                    $bignews = Cache::remember('bignewst'.'_'.$tag->id, 3600, function () use ($tag) {
                    return $tag->articles()
                            ->select('articles.id', 'articles.status', 'articles.isbig' ,'articles.head_title', 'articles.created_at', 'articles.updated_at')->where('articles.isbig', 1)
                            ->orderBy('articles.updated_at' , 'DESC')->where('articles.status', 1)->take(5)->with(['base' => function ($query) {
                                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
                            }])->get();
                });




 $importants = Cache::remember('importantst'.'_'.$tag->id, 3600, function () use ($tag) {
                    return $tag->articles()
                            ->select('articles.id', 'articles.status', 'articles.isimpo' ,'articles.head_title', 'articles.created_at', 'articles.updated_at')
                            ->where('articles.isimpo', 1)
                            ->orderBy('articles.updated_at' , 'DESC')->where('articles.status', 1)->take(3)->with(['base' => function ($query) {
                                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
                            }])->get();
                });
                

                        $specifics = Cache::remember('specificst'.'_'.$tag->id, 3600, function () use ($tag) {
                    return $tag->articles()
                            ->select('articles.id', 'articles.status', 'articles.isspe' ,'articles.head_title', 'articles.created_at', 'articles.updated_at')
                            ->where('articles.isspe', 1)->where('articles.status', 1)
                            ->orderBy('articles.updated_at' , 'DESC')->take(5)->with(['base' => function ($query) {
                                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
                            }])->get();
                });
                


                


                        $latests = Cache::remember('latestst'.'_'.$tag->id, 60, function () use ($tag) {
                    return $tag->articles()
                        ->select('articles.id', 'articles.status', 'articles.head_title', 'articles.created_at','articles.updated_at')
                        ->orderBy('articles.created_at' , 'DESC')->take(30)->where('status', 1)
                        ->with(['base' => function ($query) {
                                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
                            }])->get();
                });
                


                            
                            
                            $notes = Cache::remember('notest'.'_'.$tag->id, 3600, function () use ($tag) {
                    return $tag->articles()
                            ->select('articles.id', 'articles.status', 'articles.isnote' ,'articles.head_title', 'articles.created_at', 'articles.updated_at')
                            ->where('articles.isnote', 1)
                            ->orderBy('articles.updated_at' , 'DESC')->where('articles.status', 1)->take(5)->with(['base' => function ($query) {
                                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
                            }])->get();
                });
                


                         $reports = Cache::remember('reportst'.'_'.$tag->id, 3600, function () use ($tag) {
                    return $tag->articles()
                                                    ->select('articles.id', 'articles.status', 'articles.isrep' ,'articles.head_title', 'articles.created_at', 'articles.updated_at')
                                                    ->where('articles.isrep', 1)
                                                    ->orderBy('articles.updated_at' , 'DESC')->where('articles.status', 1)->take(5)->with(['base' => function ($query) {
                                                        $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
                                                    }])->get();
                });
                
                                                    
                                                       $bottoms = Cache::remember('bottomst'.'_'.$tag->id, 3600, function () use ($tag) {
                    return $tag->articles()
                                                    ->select('articles.id', 'articles.status', 'articles.isbot' ,'articles.head_title', 'articles.created_at', 'articles.updated_at')
                                                    ->where('articles.isbot', 1)
                                                    ->orderBy('articles.updated_at' , 'DESC')->where('articles.status', 1)->take(5)->with(['base' => function ($query) {
                                                        $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
                                                    }])->get();
                });
                
                


    


                  



        
        
        $mviews = Cache::remember('mviewst'.'_'.$tag->id, 3600, function () use ($tag) {
                    return $tag->articles()
        ->select('articles.id', 'articles.status' , 'articles.created_at' , 'article_details.article_id' , 'article_details.view_count')
        ->join('article_details', 'articles.id', '=', 'article_details.article_id')
        ->orderBy('article_details.view_count' , 'DESC')->take(10)->with(['base' => function ($query) {
                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
            }])->get();
                });
                
        
        
         $mcomments = Cache::remember('mcommentst'.'_'.$tag->id, 3600, function () use ($tag) {
                    return $tag->articles()
        ->select('articles.id', 'articles.status' , 'articles.created_at' , 'article_details.article_id' , 'article_details.comment_count')
        ->join('article_details', 'articles.id', '=', 'article_details.article_id')
        ->orderBy('article_details.comment_count' , 'DESC')->take(10)->with(['base' => function ($query) {
                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
            }])->get();
                });
                
        
return view('site.tag', compact('tag', 'mviews' ,'bottoms',
                        'mcomments', 'bignews', 'latests', 'notes', 'reports', 'specifics', 'importants'));
                } else {
                    abort(404);
                }


            
    }
    
    public function generateContent($content , $similars_tags){
     if(isset($similars_tags->articles) && !empty($similars_tags->articles) && count($similars_tags->articles) > 0 ){
          $dom = new \DOMDocument();
          libxml_use_internal_errors(true);

        $dom->loadHTML( '<?xml encoding="utf-8" ?>' . $content);
     

          $documentElement = $dom->documentElement;

$p = $dom->getElementsByTagName('p');


$i =0;


foreach ($p as $key => $item){


if (fmod($key ,4) == 0){

if (isset($similars_tags->articles[$i]) && !empty($similars_tags->articles[$i]) &&  !empty($similars_tags->articles[$i]->title) && isset($similars_tags->articles[$i]->title) ) {





@  $html_to_add = '<div class="between_links">
بیشتر بخوانید :
<a href="'.$similars_tags->articles[$i]->path().'">'.$similars_tags->articles[$i]->title.'</a></div>';


$dom_to_add = new \DOMDocument();
$dom_to_add->loadHTML('<?xml encoding="utf-8" ?>' .$html_to_add);
$new_element = $dom_to_add->documentElement;

$imported_element = $dom->importNode($new_element, true);
$item->parentNode->insertBefore($imported_element, $item->nextSibling);

$i++;

}
else{
break;
}
}



}
$output = $dom->saveHTML();

$content =  $output;
     }
     
     
     return $content;
                                         
                                           



                                           

}
    
}
