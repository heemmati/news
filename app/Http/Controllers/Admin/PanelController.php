<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\ImageUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Category\Category;
use App\Model\News\Article;
use App\Model\Base\Base;
use App\Model\Page\Page;
use App\Model\Portofolio\Portofolio;
use App\Model\Sale\Sale;
use App\Model\Service\Service;
use App\Model\Tag\Tag;
use App\Utility\Status;
use Illuminate\Support\Facades\DB;
use Modules\Techno\Utility\Infect;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use \Cviebrock\EloquentSluggable\Services\SlugService;

use App\Traits\Arabic\Arabic;
use App\Traits\Arabic\PersianRender;

class PanelController extends Controller
{
    //
    use ImageUploader;

    public function index()
    {

 /* $articles = Article::latest()->get();

//  $title = $articles->title;
// $slug = SlugService::createSlug(Base::class, 'slug', $title);
// $articles = Article::whereHas('base' , function($q) use($title){
//          $q->where('title' , $title );
//     })->get();

//       foreach($articles as $ar2){
//           $base = Base::where('slug' , $slug )->first();
//           if($base){
//               dd('jhfjhhf');
//           }
//           else{
//             // $ar2->delete();
//           }

//       }


// dd($slug , $articles);
 foreach($articles as $ar){
     $title = $ar->title;
     $articl = Article::whereHas('base' , function($q) use($title){
         $q->where('title' , $title );
     })->get();
      foreach($articl as $key=> $ar2){
          if($key > 0){
              $ar2->delete();
          }

      }
 }*/


        $user = auth()->user();

        $article_count = Article::latest()->count();
        $portofolio_count = Portofolio::latest()->count();
        $sale_count = Sale::latest()->count();
        $page_count = Page::latest()->count();
        $tag_count = Tag::latest()->count();
        $pcategory_count = Category::where('type' , Portofolio::class)->latest()->count();
        $acategory_count = Category::where('type' , Article::class)->latest()->count();
        $service_count = Service::latest()->count();


        $counts = [
            'article_count' => $article_count ,
            'portofolio_count' => $portofolio_count ,
            'sale_count' => $sale_count ,
            'page_count' => $page_count ,
            'tag_count' => $tag_count ,
            'pcategory_count' => $pcategory_count ,
            'acategory_count' => $acategory_count ,
            'service_count' => $service_count ,
        ];

        return view('admin.panel', compact(
            'user' , 'counts'

        ));
    }

    public function category_parent($category)
    {
        $cat = '' . $category->code;
        $parent = $category->parent;
        if (isset($parent) && !empty($parent)) {
            $parent_code = $this->category_parent($parent);
            $parent_code = (string)$parent_code;
            $cat = $cat . $parent_code;
        }
        return $cat;
    }


    public function upload_image(Request $request)
    {

        if ($request->hasFile('upload')) {


            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = $this->imageUpload($request, 'upload');
            $url = Storage::url($url);
            $msg = 'تصویر با موفقیت بارگذاری شد.';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";


            @header('Content-type: text/html; charset=utf-8');
            echo $response;

        }
    }

    public function status($id, $model)
    {


        DB::beginTransaction();
        if (is_numeric($id)) {

            $item = $model::findOrFail($id);
            if ($item->count() > 0) {
                if (Status::is_last_status($item->status)) {
                    $newStatus = ['status' => Status::set_first_status()];
                } else {
                    $newStatus = ['status' => $item->status + 1];
                }


            } else {
                DB::rollBack();
                toast(__('site.failed') , 'error');
                return back();
            }
        } else {
            DB::rollBack();
            toast(__('site.failed') , 'error');
            return back();
        }

        $changedStatus = $item->update($newStatus);

        if ($item->save()) {
            DB::commit();
                toast(__('site.done') , 'success');
                return back();
        }
        else {
            DB::rollBack();
            toast(__('site.failed') , 'error');
            return back();
        }

    }

    public function redesign_image(){

        $rarticle = Article::findOrFail(102);




/*        dd(Storage::url($rarticle->image));
*/
$test = storage_path('/app/insta/template.png');


    // $waterMarkUrl = Image::make(url('admin-theme/assets/media/image/bannerp.png'));



// $waterMarkUrl->resize(180,80);

            $image = Image::make($test);
            // /* insert watermark at bottom-left corner with 5px offset */
            // $image->insert($waterMarkUrl, 'bottom-left', 0, 60);

        //  $Arabic = new Arabic('Glyphs');
        // $name = $Arabic->utf8Glyphs($rarticle->title);
        
        
        // $name = PersianRender::render($rarticle->title);
        
 $translates = [
     ['Water' , 'واتر' , 'آب'] ,
['Duck' , 'داک' , 'مرغابی'] ,
['Cow' , 'کا' , 'گاو'] ,
['Pen' , 'پن' , 'خودکار'] ,
['Pencil' , 'پنسیل' , 'مداد'] ,
['Book' , 'بوک' , 'کتاب'] ,
['Computer' , 'کمیوتر' , 'رایانه'] ,
['Keyboard' , 'کیبورد' , 'صفحه کلید'] ,
     ];
     
     
        
            $image->text($translates[0][0], $image->width() / 2, $image->height() / 2 - 100, function($font) {
          $font->file(base_path('/admin-theme/assets/fonts/yekanbakh/YekanBakh-Bold.woff'));
          $font->size(400);
          $font->color('#000');
          $font->align('center');
          $font->valign('center');
          $font->angle(0);
      });
      
      $pron = PersianRender::render($translates[0][1]);
      
        $image->text($pron , $image->width() / 2, $image->height() / 2  + 200, function($font) {
          $font->file(base_path('/admin-theme/assets/fonts/yekanbakh/YekanBakh-Bold.woff'));
          $font->size(100);
          $font->color('#888');
          $font->align('center');
          $font->valign('center');
          $font->angle(0);
      });
      
      
      
       $pron = PersianRender::render($translates[0][2]);
      
        $image->text($pron , $image->width() / 2, $image->height() / 2 + 400, function($font) {
          $font->file(base_path('/admin-theme/assets/fonts/yekanbakh/YekanBakh-Bold.woff'));
          $font->size(250);
          $font->color('#becc00');
          $font->align('center');
          $font->valign('center');
          $font->angle(0);
      });
      
      
            $image->save(storage_path('/app/insta/template2.png'));
      dd(Storage::url('/app/insta/template2.png'));

    }

}
