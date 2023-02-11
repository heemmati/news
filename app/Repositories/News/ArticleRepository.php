<?php


namespace App\Repositories\News;


use App\Miracles\Crud;
use App\Model\Region\Region;
use App\Traits\Region\RegionHelper;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Model\Category\Category;
use App\Traits\Category\CategoryHelper;
use App\Model\Connection\Connection;
use App\Model\News\Article;
use App\Model\News\ArticleDetail;
use App\Model\News\ArticleOrigin;
use App\Model\News\ArticleType;
use App\Model\Position\Position;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Carbon;

class ArticleRepository extends Crud
{

    use CategoryHelper, RegionHelper;

    public function __construct()
    {
        $this->model = Article::class;
    }

    function index()
    {
        /* Get the Start */
        $start = Request::capture()->get('start');
        if (!isset($start) || empty($start)) {
            $start = null;
        } else {
            $start = explode('/', $start);
            $start = Verta::getGregorian($start[0], $start[1], $start[2]);
            $start = Carbon::create($start[0], $start[1], $start[2]);

        }


        /* Get the end */
        $end = Request::capture()->get('end');
        if (!isset($end) || empty($end)) {
            $end = null;
        } else {
            $end = explode('/', $end);
            $end = Verta::getGregorian($end[0], $end[1], $end[2]);
            $end = Carbon::create($end[0], $end[1], $end[2]);

        }


        /* Get the Title */
        $title = Request::capture()->get('title');
        if (!isset($title) || empty($title)) {
            $title = null;
        }






        /* Get the Title */
        $reporter = Request::capture()->get('reporter');
        if (!isset($reporter) || empty($reporter)) {
            $reporter = null;
        }




        /* Get the Code */
        $code = Request::capture()->get('code');
        if (!isset($code) || empty($code)) {
            $code = null;
        }


        /* Get the Status */
        $status = Request::capture()->get('status');

        if ((!isset($status) || empty($status)) && !is_numeric($status)) {

            $status = null;
        }


        /* Get the Status */
        $categories = Request::capture()->get('categories');
        if (!isset($categories) || empty($categories)) {
            $categories = null;
        }




        /* Get the Status */
        $regionss = Request::capture()->get('regions');
        if (!isset($regionss) || empty($regionss)) {
            $regionss = null;
        }





        $articles = Article::OwnerArticle(auth()->id())->Reporter($reporter)->Code($code)->Title($title)->Status($status)->Category($categories)->Start($start)->End($end)->Region($regionss)->with(['base' => function ($query) {
                $query->select('id', 'title', 'baseable_type', 'baseable_id', 'image' , 'slug');
            }])->with(['categories' => function ($query) {
                $query->select('categories.id')->with(['base' => function ($query6) {
                $query6->select('id', 'title', 'baseable_type', 'baseable_id',  'slug');
            }]);
            }])->latest()->paginate(25);

$view = ArticleDetail::select('view_count')->sum('view_count');

        $breadcrumbs = $this->breadcrumb_generator('articles.index');
        $categories = Cache::remember('categittt', 36000, function () {
           return  Category::where('type', Article::class)->with(['base' => function ($query) {
                $query->select('id', 'title', 'baseable_type', 'baseable_id',  'slug', 'description');
            }])->get();
        });
        
       
        $regions =  Cache::remember('regions', 36000, function () {
           return Region::latest()->with(['base' => function ($query) {
                $query->select('id', 'title', 'baseable_type', 'baseable_id',  'slug', 'description');
            }])->get();
        });
        return view('module.news.admin.list', compact('articles', 'regions' ,'breadcrumbs', 'categories','view'));


    }

    function create()
    {
        $categories = $this->get_all_categories(Article::class);
        $breadcrumbs = $this->breadcrumb_generator('articles.create');
        $types = ArticleType::latest()->get();
        $regions = $this->user_to_regions(auth()->user());
        $origins = ArticleOrigin::latest()->get();
        $connections = Connection::latest()->get();
        $positions = Position::where('type', Article::class)->latest()->get();
        $users = User::get();

        return view('module.news.admin.create', compact('breadcrumbs', 'users', 'connections', 'categories', 'types', 'origins', 'positions', 'regions'));

    }

    function edit($id)
    {
        $categories = $this->get_all_categories(Article::class);
        $breadcrumbs = $this->breadcrumb_generator('articles.edit');
        $types = ArticleType::latest()->get();
        $origins = ArticleOrigin::latest()->get();
        $positions = Position::where('type', Article::class)->latest()->get();
        $connections = Connection::latest()->get();
        $article = $this->model::findOrFail($id);
        $selected_categories = $article->categories()->get()->pluck('id')->toArray();
        $selected_positions = $article->positions()->get()->pluck('id')->toArray();
        $selected_regions = $article->regions()->get()->pluck('id')->toArray();
        $selected_connections = $article->connections()->get()->pluck('id')->toArray();
        $users = User::get();
        $regions = $this->user_to_regions(auth()->user());



        return view('module.news.admin.edit', compact('article', 'users','selected_regions', 'selected_connections', 'selected_positions', 'breadcrumbs', 'categories', 'types', 'connections', 'origins', 'positions', 'selected_categories' , 'regions'));

    }

    public function show($id)
    {
        $article = $this->model::findOrFail($id);

        $breadcrumbs = $this->breadcrumb_generator('articles.show');

        return view('module.news.admin.show', compact('article', 'breadcrumbs'));

    }


}
