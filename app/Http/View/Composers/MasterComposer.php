<?php


namespace App\Http\View\Composers;

use App\Model\News\Article;
use App\Model\Tag\Tag;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use App\Model\Category\Category;
use App\Model\Menu\Menu;
use App\Model\Position\Position;
use App\Model\Setting\GeneralItem;
use Carbon\Carbon;

class MasterComposer
{

    public function composeMaster(View $view)
    {
        $logo = Cache::remember('logo', 200000, function () {
            return GeneralItem::where('code', 'logo')->first();
        });

        $upper_menu = Cache::remember('upper_menu', 200000, function () {
            return Menu::where('code', 'upper_menu')->first();
        });


        $items = null;

        $view->with([

            'logo' => $logo,
            'upper_menu' => $upper_menu,
            'items' => $items,


        ]);
    }

    public function compose(View $view)
    {
        $logo = Cache::remember('logo', 200000, function () {
            return GeneralItem::where('code', 'logo')->first();
        });

        $upper_menu = Cache::remember('upper_menu', 200000, function () {
            return Menu::where('code', 'upper_menu')->first();
        });


        $v = verta();

        $today = $v->format('%B %d، %Y'); // دی 07، 1395


        $view->with([
            'logo' => $logo,
            'upper_menu' => $upper_menu,
            'today' => $today,
        ]);


    }


    public function front(View $view)
    {


        $categories = Cache::remember('categories', 2000000, function () {
            return Category::select('id', 'parent_id')->where('type', \App\Model\News\Article::class)->where('parent_id', 0)->where('status', 1)->orderBy('order')->with(['base' => function ($query) {
                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'slug', 'description')->get();
            }])->with(['children' => function ($query) {
                $query->select('id', 'parent_id')->where('status', 1)->with(['base' => function ($query) {
                    $query->select('id', 'title', 'baseable_type', 'baseable_id', 'slug', 'description')->get();
                }])->get();
            }])->get();

        });


        $v = verta();
        $today = $v->format('%B %d، %Y'); // دی 07، 1395
        $en_today = Carbon::now();

        $en_today = $en_today->format('jS F y');
        ;


        $logo = Cache::remember('logo', 200000, function () {
            return GeneralItem::where('code', 'logo')->first();
        });
        $general = [
            'logo' => Cache::remember('logo', 2000000, function () {
                return GeneralItem::select('id', 'title', 'code', 'value', 'type')->where('code', 'logo')->with(['images' => function ($query) {
                    $query->select('images.id', 'images.title', 'images.src', 'images.alt')->get();
                }])->first();
            })
            ,
            'logo-white' => Cache::remember('logo-white', 2000000, function () {
                return GeneralItem::select('id', 'title', 'code', 'value', 'type')->where('code', 'logo-white')->with(['images' => function ($query) {
                    $query->select('images.id', 'images.title', 'images.src', 'images.alt')->get();
                }])->first();
            })
            ,
            'footer-about-desc' => Cache::remember('footer-about-desc', 2000000, function () {
                return GeneralItem::select('id', 'title', 'code', 'value', 'type')->where('code', 'footer_about_desc')->first();
            }),
            'footer-about-title' => Cache::remember('footer-about-title', 2000000, function () {
                return GeneralItem::select('id', 'title', 'code', 'value', 'type')->where('code', 'footer_about_title')->first();
            }),

            'copy_right_text' => Cache::remember('copy_right_text', 2000000, function () {
                return GeneralItem::select('id', 'title', 'code', 'value', 'type')->where('code', 'copy_right_text')->first();
            }),

        ];

        $footer_about =  Cache::remember('footer_about', 2000000, function () {
        return GeneralItem::select('id', 'title', 'code', 'value', 'type')->where('code', 'footer_about')->first();
    });

        $socials = Cache::remember('socials', 2000000, function () {
            return [
                'instagram' => GeneralItem::select('id', 'title', 'code', 'value', 'type')->where('code', 'instagram')->first(),
                'telegram' => GeneralItem::select('id', 'title', 'code', 'value', 'type')->where('code', 'telegram')->first(),
                'whatsapp' => GeneralItem::select('id', 'title', 'code', 'value', 'type')->where('code', 'whatsapp')->first(),
                'twitter' => GeneralItem::select('id', 'title', 'code', 'value', 'type')->where('code', 'twitter')->first(),
                'facebook' => GeneralItem::select('id', 'title', 'code', 'value', 'type')->where('code', 'facebook')->first(),
                'aparat' => GeneralItem::select('id', 'title', 'code', 'value', 'type')->where('code', 'aparat')->first(),
            ];
        });



        $fnews =  Cache::remember('fnews', 360, function () {
            return Article::select('articles.id', 'articles.status', 'articles.head_title', 'articles.created_at', 'articles.updated_at')->where('status', 1)->orderBy('articles.updated_at', 'DESC')->take(5)->with(['base' => function ($query) {
                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
            }])->get();
        });


        $footer_news =  Cache::remember('footer_news', 360, function () {
            return Article::select('articles.id', 'articles.status', 'articles.head_title', 'articles.created_at', 'articles.updated_at')->where('status', 1)->whereHas('positions' , function ($pos)  {
                $pos->where('positions.code' , 'footer_news');
            })->orderBy('articles.updated_at', 'DESC')->take(3)->with(['base' => function ($query) {
                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug', 'description');
            }])->get();
        });
        /**** Big News  ****/


        $footer_tags = Cache::remember('footer_tags', 360, function () {
            return Tag::latest()->take(20)->get();
        });


        $view->with([
            'general' => $general,
            'logo' => $logo,
            'categories' => $categories,
            'today' => $today,
            'socials' => $socials,
            'fnews' => $fnews,
            'footer_news' => $footer_news ,
            'footer_about' => $footer_about ,
            'footer_tags' => $footer_tags ,
            'en_today' => $en_today ,


        ]);

    }

    public function login(View $view)
    {

        $general = [
            'logo' => GeneralItem::where('code', 'logo')->first(),
            'logo-white' => GeneralItem::where('code', 'logo-white')->first(),
            'footer-about-desc' => GeneralItem::where('code', 'footer_about_desc')->first(),
            'footer-about-title' => GeneralItem::where('code', 'footer_about_title')->first(),
            'copy_right_text' => GeneralItem::where('code', 'copy_right_text')->first(),
        ];
        $view->with([
            'general' => $general,
        ]);

    }

    public function auths(View $view)
    {


    }


    public function getSocials($socials)
    {

    }

}
