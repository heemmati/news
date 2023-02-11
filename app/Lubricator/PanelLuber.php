<?php


namespace App\Lubricator;


use App\Model\Contact\Contact;
use App\Model\Faq;

use App\Model\Permission;
use App\Model\Role;
use App\Model\Theme\Theme;
use App\User;
use Illuminate\Support\Facades\Auth;

use App\Model\Advertisment\AdsTariff;
use App\Model\Advertisment\Advertisment;
use App\Model\Advertisment\AdvertismentType;
use App\Model\Category\Category;
use App\Model\Club\Club;
use App\Model\Comment\Comment;
use App\Model\Connection\Connection;
use App\Model\ContentManagement\Content;
use App\Model\ContentManagement\ContentType;
use App\Model\Feed\Feed;
use App\Model\Language\Lang;
use App\Model\Language\Translate;
use App\Model\Word;
use App\Model\WordGroup;
use App\Model\Menu\MenuItem;
use App\Model\News\ArticleOrigin;
use App\Model\News\ArticleType;

use App\Model\Newspaper\Newspaper;
use App\Model\Newspaper\NewspaperType;
use App\Model\Page\Page;
use App\Model\Portofolio\Portofolio;

use App\Model\Position\Position;
use App\Model\Resume\Resume;
use App\Model\Sale\Sale;
use App\Model\Sale\Tracking;
use App\Model\Service\Service;
use App\Model\Setting\GeneralItem;

use App\Model\Skill\Skill;
use App\Model\Slider\Slider;
use App\Model\Social\Social;

use App\Model\Techno\Cases;
use App\Model\Techno\Technology;
use App\Model\Testimonial\Testimonial;

class PanelLuber
{


    const profile = [

    ];
    const content = [
        'articles' => Article::class,
        'article-categories' => Category::class,
        'regions' => Region::class,
       'article-types' => ArticleType::class,
       'article-origins' => ArticleOrigin::class,

        'feeds' => Feed::class,
        'tags' => Tag::class,
        'pages' => Page::class,
        'journals' => Journal::class,
        'themes' => Theme::class,





       'faqs' => Faq::class,

        'newspapers' => Newspaper::class,
        'newspaper-types' => NewspaperType::class,


    ];

    const mypanel = [

    ];


    const general = [
        'positions' => Position::class,
        'menus' => Menu::class,
        'menu-items' => MenuItem::class,
        'generals' => General::class,
        'general-items' => GeneralItem::class,
       'sliders' => Slider::class,

       'connections' => Connection::class,
       'socials' => Social::class,
       'contacts' => Contact::class,

    ];
    const helpers = [
    ];
    const languages = [
       'langs' => Lang::class,
       'word-groups' => WordGroup::class,
       'words' => Word::class,
        'translates' => Translate::class,
    ];


    const send = [

       'testimonials' => Testimonial::class,
       'advertisement-types' => AdvertisementType::class,
       'ads-tariffs' => AdsTariff::class,
       'advertisements' => Advertisement::class,

    ];
    const user = [
        'users' => User::class,
        'roles' => Role::class,
        'permissions' => Permission::class,
        'clubs' => Club::class,

    ];

    public static function getListMenu($id, $name, $icon, $has = NULL)
    {

        switch ($id) {

            case 'analytics':
                $lists = self::profile;
                break;
            case 'user':
                $lists = self::user;
                break;
            case 'components':
                $lists = self::general;
                break;
            case 'forms':
                $lists = self::content;
                break;

            case 'mypanel':
                $lists = self::mypanel;
                break;
            case 'languages':
                $lists = self::languages;
                break;
            case 'send':
                $lists = self::send;
                break;

            case 'helpers':
                $lists = self::helpers;
                break;


        }

        if (isset($has) && !empty($has)) {
            echo view('admin.inc.before', [
                'type_en' => $id,
                'type_fa' => $name,
                'type_icon' => $icon
            ]);
        }


        foreach ($lists as $key => $model) {
            self::getItemMenu($key, $model);
        }

        if (isset($has) && !empty($has)) {
            echo view('admin.inc.after', [
                'type_en' => $id,
                'type_fa' => $name,
                'type_icon' => $icon
            ]);
        }
    }

    public static function getItemMenu($route_name, $model)
    {


        // $count = self::get_badgeted($model, \auth()->id());

        $count = 0;
        if (Auth::user()->can($route_name . '.index') || Auth::user()->can($route_name . '.create')) {
            echo view('admin.inc.menu', ['route_name' => $route_name, 'count' => $count]);
        }
    }

//    public static function get_badgeted($model, $user)
//    {
//        $watching = Watch::where('user_id', $user)->where('watchable_type', $model)->where('watched', 0)->get();
//
//        if (isset($watching) && !empty($watching)) {
//            return count($watching);
//        }
//        else {
//            return 0;
//        }
//    }
}
