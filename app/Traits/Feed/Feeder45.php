<?php


namespace App\Traits\Feed;


use App\Model\Image\Image;
use App\Model\Region\Region;
use App\Traits\Breadcrumb;
use App\Traits\ImageUploader;
use App\Traits\Region\RegionHelper;
use App\Utility\Status;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Model\Base\Base;
use App\Model\Category\Category;
use App\Traits\Category\CategoryHelper;
use App\Repositories\Connection\ConnectionRepository;
use App\Model\Feed\Feed;
use App\Model\Reword\Reword;
use App\Traits\Image\ImageHelper;
use App\Model\News\Article;
use App\Repositories\News\ArticleBooleanRepository;
use App\Repositories\News\ArticleDetailRepository;
use App\Repositories\News\ArticleRepository;
use App\Model\Position\Position;
use App\Repositories\Position\PositionRepository;
use Sunra\PhpSimple\HtmlDomParser;
use function simplehtmldom_1_5\file_get_html;
use DomXPath;
use App\Model\Tag\Tag;
use App\Jobs\ItemFeed;

use App\services\GoogleTranslate;


trait Feeder
{

use CategoryHelper, ImageUploader, ImageHelper, RegionHelper;

       public function fillFeed($feed)
    {
  
       try{
        if ($feed->type == \App\Utility\Feed\Feed::MANUAL) {

            $link_pattern =  $feed->link_pattern;
            $opts = array('http' => array('header' => "User-Agent:MyAgent/1.0\r\n" ,   'ssl'=>array(
        'verify_peer'=>false,
        'verify_peer_name'=>false,
    )));        $context = stream_context_create($opts);

          
            $homepage = $this->get_web_page($feed->link_class);
            //$homepage = html_entity_decode($homepage);

            $doc = new \DOMDocument('1.0', 'UTF-8');
            @$doc->loadHTML('<?xml encoding="utf-8" ?>' . $homepage['content']);
            



            $items = $doc->getElementsByTagName('item');

            if (isset($items) && !empty($items) && count($items) > 0) {

                foreach ($items as $key => $item) {


                    $title = $item->getElementsByTagName('title');

                    $title = $this->DOMinnerHTML($title[0]);
                    $title = trim($title);

                    $base = Base::where('title', $title)->first();
                    
                    if (!isset($base) || empty($base)) {
                        
                        $links = $item->getElementsByTagName('link');

                        if (isset($links) && !empty($links) && count($links) > 0) {
                            $link = $links[0]->nextSibling->data;
                            $link = trim($link);
                            $this->store_from_link($feed, $link);


                        }
                    }


                }


            } 
            else {
                
                $links = $doc->getElementsByTagName('a');


 
                $parse = parse_url($feed->link_class);
                $domain = $parse['host'];


                // $xpath = new DOMXPath($doc);
                // $arr = array();
                // $links = $xpath->query('//a[contains(@href, "' . $domain . '")]');

$links2 = array();
     foreach ($links as $kelid => $link) {
          $link2 = $this->rel2abs($link->getAttribute("href") , 'https://'.$domain );
          array_push($links2,$link2);
          
     }
     


if(count($links2) > 0 ) {
     $counter = 0;        
                foreach (array_unique($links2) as $kelid4 => $link3) {
                    
                    
                    
                    
                    if($counter < 1000){
                        $uses_can = 0; 
                

if(isset($link_pattern) && !empty($link_pattern)){
        if(str_contains($link3, $link_pattern)){
     $uses_can = 1;

}   
}
else{
  if(str_contains($link3, $domain)){
     $uses_can = 1;

                  
} 
}




if($uses_can){
        
    $counter++;
               


  $this->store_from_link($feed, $link3); 
}
                    }






                }
              

}
           

            }

        } 
        else {


             $homepage = file_get_contents('https://ftr.fivefilters.net/makefulltextfeed.php?step=3&fulltext=1&url='. $feed->link_class .'&max=3&links=remove&exc=&submit=Create+Feed');
            //$homepage = file_get_contents('https://www.freefullrss.com/feed.php?url=' . $feed->link_class . '&max=10');

            $homepage = html_entity_decode($homepage);
            $doc = new \DOMDocument('1.0', 'UTF-8');


            @$doc->loadHTML($homepage);

            $items = $doc->getElementsByTagName('item');

            if (isset($items) && !empty($items) && count($items) > 0) {

                foreach ($items as $key => $item) {

                    $title = $item->getElementsByTagName('title');
                    $title = $this->DOMinnerHTML($title[0]);
                    $description = $item->getElementsByTagName('description');
                    $images = $item->getElementsByTagName('img');

                    $body = $this->DOMinnerHTML($description[0]);

                    $this->set_new($feed, trim($title), $body, $images);


                }


            }


        }  
       }
       catch(\Exception $e){
           
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

    public function articlBooleanSet($article)
    {
        $boolean = [
            'article_id' => $article->id,
            'comments' => 1,
            'image_rss' => 1,
            'most_comments' => 0,
            'most_rated' => 0,
            'image' => 1,
            'most_viewed' => 0,
            'view_count' => 1,
            'social' => 0,
            'iframe' => 0,
            'rss' => 0,
        ];


        return $boolean;
    }

    public function get_web_page($url)
    {
        header("Content-Type: text/html; charset=utf-8");
        $user_agent = 'Mozilla/5.0 (Windows NT 6.1; rv:8.0) Gecko/20100101 Firefox/8.0';

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

    function get_include_contents($filename)
    {
        if (is_file($filename)) {
            ob_start();
            include $filename;
            return ob_get_clean();
        }
        return false;
    }

      public function set_new($feed, $title = null, $body = null, $images = null)
    {
        
     
                       if (isset($title) && !empty($title) && strlen($title) < 255) {
                           $e2title = $title;
    $title = $title . '| تکلی';
            $base = Base::where('title', $title)->orWhere('title' , $e2title)->orWhere('title' , 'LIKE' , '%' . $e2title . '%')->first();
            
            if(!isset($base) || empty($base)){
                $parse = parse_url($feed->link_class);
                $domain = $parse['host'];
                
                if ( !empty($body) && strlen($body) <= 65000) {

                if(isset($images) && !empty($images) && count($images) > 0){
               
          if (isset($images[0]) && !empty($images[0])) {   
              
                    $src = $images[0]->getAttribute('src');
                    $src = explode("?",$src);
           $src = $src[0]; 
                    if (preg_match('/(\.jpg|\.png|\.webp)$/', $src)) {
                        $src = $this->rel2abs($src , 'https://'.$domain );
                        $src = $this->imageUploadExternalLink($src);
                       
                       
                        $image = Image::create([
                            'user_id' => 1,
                            'title' => $title,
                            'alt' => $title,
                            'src' => $src,
                        ]);
                    }
                }
                // if (isset($image[1]) && !empty($image[1])) {
                    
                //     $src = $images[1]->getAttribute('src');
                //           $src = $this->rel2abs($src , 'https://'.$domain );
                //     if (preg_match('/(\.jpg|\.png|\.webp)$/', $src)) {
                //         $image2 = $src;
                //     }
                // } else {
                //     $image2 = null;
                // }

  
         
}
else{
    $image2 = null;
    $image = null;
}

          

                $data = [
                    'head_title' => null,
                    'footer_title' => null,
                    'creator_id' => 1,
                    'updator_id' => null,
                    'origin_id' => null,
                    'type' => rand(1,3),
                    'origin_type' => null,
                    'src' => $feed->title . ' | ' . $domain ,
                    'external_link' => null,
                    'image2' => !empty($image) ? !empty($image->src) ? $image->src : '' : '',
                    'status' => 1,
                ];
                
                
                $article_rep = new ArticleRepository();
                $article = $article_rep->store($data);
                
              
                
                if ($article) {
               

                    //  Generate Code

                    $article_id = sprintf('%09d', $article->id);

                    $article->update([
                        'code' => $article_id
                    ]);

                    $article->save();

      $base_data = [
                        'title' => $title,
                        'entitle' => null,
                        'description' => Str::limit(strip_tags($body), 200),
                        'short' => Str::random(6),
                        'body' => $body,
                        'image' => !empty($image) ? !empty($image->src) ? $image->src : '' : '' ,
                        'baseable_id' => $article->id,
                        'baseable_type' => get_class($article),
                    ];

                    $base_rep = new \App\Repositories\Base\BaseRepository();
                    $base = $base_rep->store($base_data);

if($base){
    

    $producer_data = [
                        'article_id' => $article->id,
                        'company' => null,
                        'company_id' => null,
                        'author' => null,
                        'author_id' => null,
                        'reporter' => null,
                        'reporter_id' => null,
                        'photographer' => null,
                        'photographer_id' => null,
                        'translator' => null,
                        'translator_id' => null,
                        'writer' => null,
                        'writer_id' => null
                    ];

                    $producer_repository = new \App\Repositories\News\ArticleProducerRepository();
                    $article_producer = $producer_repository->store($producer_data);

                    $detail_data = [
                        'article_id' => $article->id,
                        'view_count' => 0,
                        'rate_count' => 0,
                        'bookmark_count' => 0,
                        'comment_count' => 0,
                        'click_count' => 0,
                    ];
                    $detail_rep = new ArticleDetailRepository();
                    $article_detail = $detail_rep->store($detail_data);


                    $boolean_data = $this->articlBooleanSet($article);
                    $boolean_rep = new ArticleBooleanRepository();
                    $boolean_rep->store($boolean_data);


                    // if (isset($image) && !empty($image)) {
                    //     $default_image = $image->id;

                    //     if (isset($default_image)) {
                    //         $this->attach_images($article, [$default_image]);
                    //     }

                    // }


                    $category_ids = $feed->categories()->get()->pluck('id')->toArray();
                    $category = $this->connect_object_category($article, $category_ids);

                    // $regions = $feed->regions()->get()->pluck('id')->toArray();
                    // if (isset($regions) && !empty($regions)) {
                    //     $this->set_regions_array($article, $regions);
                    // }
                    
                    
                    
                // $this->tagging_body($article);
                    


                    $position_rep = new PositionRepository();
                    $positions = Position::where('type', Article::class)->inRandomOrder()->limit(1)->get()->pluck('id')->toArray();

                    $position = $position_rep->store_array($article, $positions);


                        
                        
}
 else{
                    DB::rollBack(); 
                }

   

                }
                else{
                    DB::rollBack(); 
                }
            } 
                else{
                    DB::rollBack(); 
                }    
            }
            
            else{
               DB::rollBack(); 
            }
           


        }
        else{
          
          DB::rollBack();            
  
        } 
         
     
    }


  public function translate($body){
       
      
  
$text 			= $body;
$source 		= 'fa';
$target 		= 'az';

$translation 	= GoogleTranslate::translate($source, $target, $text);

$source 		= 'az';
$target 		= 'ku';

$translation 	= GoogleTranslate::translate($source, $target, $translation);

$source 		= 'ku';
$target 		= 'fa';


$translation 	= GoogleTranslate::translate($source, $target, $translation);


return $translation;



    }
    
    


public
function store_from_link($feed, $link, $titleo = null)
{




    $link = str_replace('%2F', '/', str_replace('%3A', ':', urlencode($link)));



    $des = $this->get_web_page($link);


    $doc = new \DOMDocument('1.0', 'UTF-8');
    @$doc->loadHTML('<?xml encoding="utf-8" ?>' . $des['content']);

//                                                 @$doc->loadHTML($link_page);
    $title_class = $feed->title_class;
    $description_class = $feed->description_class;
    $image_class = $feed->image_class;
    $body_class = $feed->body_class;
    $image_dom = $feed->image_dom;
    $striping = $feed->striping;
    $deleting = $feed->deleting;


    $finder = new DomXPath($doc);
    

    if (isset($body_class) && !empty($body_class)) {
        $bodys = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $body_class ')]");
        if (isset($bodys) && !empty($bodys) && count($bodys) > 0) {
            $body = $this->DOMinnerHTML($bodys[0]);
            // if(isset($deleting) && !empty($deleting)){
            //      $deletss = $body->query($deleting);
            //      foreach($deletss as $delete){
            //          $delete->parentNode->removeChild($delete);
            //      }
            //  }
         
            $body = trim($body);
            
             if($striping){
                 $body = strip_tags($body , '<p><h2><h3><h4><h5><h6><table><tr><th><td><span><ul><li><blockquote>');
             }
 
      
      $body = $body . 'منبع : '.
            '<a href="'.$link.'">منبع</a>';
            
            
       $body = $this->dictionary($body);
    //   $body = $this->translate($body);
    
      
        } else {
            $body = null;
        }
    } 
    else {
        $body = null;
    }




if(isset($body) && !empty($body)){
    
 
    
    
     if (isset($title_class) && !empty($title_class)) {
        $titles = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $title_class ')]");
        if (isset($titles) && !empty($titles) && count($titles) > 0) {
            $title = $this->DOMinnerHTML($titles[0]);

            $title = strip_tags($title);
            $title = trim($title);
        } else {
            $title = null;
        }
    } else {
        if (isset($titleo) && !empty($titleo)) {
            $title = $titleo;
        } 
        else {
           $hs = $doc->getElementsByTagName('h1');
          if(isset($hs[0]) && !empty($hs[0])){
             
           $title = $this->DOMinnerHTML($hs[0]);
           
           $title = strip_tags($title);
         
          }
          else{
             $title = null; 
          }
         
        }

    }
    
    
       

    if (isset($description_class) && !empty($description_class)) {
        $descriptions = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $description_class ')]");
        if (isset($descriptions) && !empty($descriptions) && count($descriptions) > 0) {
            $description = $this->DOMinnerHTML($descriptions[0]);;
            $description = trim($description);
        }
    } else {
        if (isset($body) && !empty($body)) {
            $description = Str::limit(strip_tags($body), 70);
        } else {
            $description = null;
        }

    }
    
    if (!isset($image_dom) || empty($image_dom)) {

    if (!isset($image_class) || empty($image_class)) {
        $image_class = $body_class;
        $images = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $image_class ')]");
       
        if (isset($images) && !empty($images) && count($images) > 0) {
            $images = $images[0]->getElementsByTagName('img');
        }
        else{
            $images = null;
        }


    }
    else{
         $images = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $image_class ')]");
            if (isset($images) && !empty($images) && count($images) > 0) {
           
            $images = $images[0]->getElementsByTagName('img'); 
           
            
        }
        else{
            $images = null;
        }
        }
    }
    
    else{
       
        $images = $finder->query($image_dom);
     
        if (isset($images) && !empty($images) && count($images) > 0) {
            
            $images = $images[0]->getElementsByTagName('img');
          
        }
        else{
            $images = null;
        }
    }



    if (isset($title) && !empty($body) && !empty($title)) {

        $this->set_new($feed, trim($title), $body, $images);
    }
}

   

}


public function rel2abs($rel, $base)
{
    /* return if already absolute URL */
    if (parse_url($rel, PHP_URL_SCHEME) != '') return $rel;

if(!empty($rel[0])){
      /* queries and anchors */
    if ($rel[0]=='#' || $rel[0]=='?') return $base.$rel;
}
  

    /* parse base URL and convert to local variables:
       $scheme, $host, $path */
    extract(parse_url($base));
    if (isset($path) === true){
    /* remove non-directory element from path */
    $path = preg_replace('#/[^/]*$#', '', $path);
}
else{
    $path = '';
}
    /* destroy path if relative url points to root */
    if(!empty($rel[0])){
    if ($rel[0] == '/') $path = '';
    }

    /* dirty absolute URL */
    $abs = "$host$path/$rel";

    /* replace '//' or '/./' or '/foo/../' with '/' */
    $re = array('#(/\.?/)#', '#/(?!\.\.)[^/]+/\.\./#');
    for($n=1; $n>0; $abs=preg_replace($re, '/', $abs, -1, $n)) {}

    /* absolute URL is ready! */
    return $scheme.'://'.$abs;
}


public function tagging_body($article){
    
  
  $base = $article->base;
          
            
    $tags_ids = Tag::latest()->get();
       
            foreach ($tags_ids as $tagged){


if(str_contains($base->body , $tagged->title )){
  if( $tagged->title != 'سهند'){
      $link_tag = '<a href="'.$tagged->path().'" >'.$tagged->title.'</a>';

                               $new_article = str_replace(''.$tagged->title.'' , $link_tag , $base->body);
                               if ($new_article != $base->body) {
                                   $base->update([
                                       'body' => $new_article
                                   ]);

                                   $base->save();



                                   $article->tags()->attach([$tagged->id]);
                                   
                               }
}  
}


           
                             


                        

                       }
                       
                       
                       
                       return true;
}

public function dictionary($body){
    
        
   $changable = Reword::get(); 
    $words = $changable->pluck('word')->toArray();
    $trans = $changable->pluck('trans')->toArray();
     $body = str_replace($words , $trans , $body);
     
     return $body;
}




}
