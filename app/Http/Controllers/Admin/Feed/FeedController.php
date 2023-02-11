<?php

namespace App\Http\Controllers\Admin\Feed;

use App\Jobs\FillFeed;
use App\Model\Image\Image;
use App\Model\Region\Region;
use App\Traits\Breadcrumb;
use App\Model\Reword\Reword;

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
use App\Traits\Image\ImageHelper;
use App\Traits\Feed\Feeder;
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

class FeedController extends Controller
{

    use Breadcrumb, CategoryHelper, ImageUploader, ImageHelper, RegionHelper , Feeder;

    public function index()
    {
        $breadcrumbs = $this->breadcrumb_generator('feeds.index');

        $feeds = Feed::latest()->get();

        return view('module.feed.admin.index', compact('feeds', 'breadcrumbs'));
    }

    public function create()
    {
        $breadcrumbs = $this->breadcrumb_generator('feeds.create');
        $categories = Category::where('type', Article::class)->get();
        $regions = Region::where('status', 1)->get();
        return view('module.feed.admin.create', compact('breadcrumbs', 'categories', 'regions'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required']
        ]);

        DB::beginTransaction();

        $status = $request->input('status');
        if (!isset($status) || empty($status)) {
            $status = 0;
        }

        $feed = Feed::create([
            'creator_id' => auth()->id(),
            'title' => $request->input('title'),
            'title_class' => $request->input('title_class'),
            'link_class' => $request->input('link'),
            'striping' => $request->input('striping'),
            'deleting' => $request->input('deleting'),
            'image_dom' => $request->input('image_dom'),
            'description_class' => $request->input('description_class'),
            'image_class' => $request->input('image_class'),
            'body_class' => $request->input('body_class'),
            'target_box' => $request->input('target_box'),
            'link_pattern' => $request->input('link_pattern'),
            'type' => $request->input('type'),
            'status' => $status
        ]);


        if ($feed instanceof Feed) {

            $category = $this->connect_object_category_via_request($feed, $request);


            $this->set_regions_request($feed, $request);
            DB::commit();
            toast(__('site.done'), 'success');
            return back();
        } else {
            DB::rollBack();
            toast(__('site.failed'), 'error');
            return back();
        }

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $feed = Feed::findOrFail($id);
        return view('module.feed.admin.show', compact($feed));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $feed = Feed::findOrFail($id);
        $breadcrumbs = $this->breadcrumb_generator('feeds.edit');
        $categories = Category::where('type', Article::class)->get();
        $regions = Region::where('status', 1)->get();
        
        $selected_categories = $feed->categories()->get()->pluck('id')->toArray();

        $selected_regions = $feed->regions()->get()->pluck('id')->toArray();
        
        return view('module.feed.admin.edit', compact('breadcrumbs' , 'feed','selected_categories', 'selected_regions', 'categories', 'regions'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
         $request->validate([
            'title' => ['required']
        ]);

        DB::beginTransaction();

        $feed = Feed::findOrFail($id);


        $status = $request->input('status');
        if (!isset($status) || empty($status)) {
            $status = 0;
        }
    $striping = $request->input('striping');
if (!isset($striping) || empty($striping)) {
            $striping = 0;
        }

        $feed->update([
           
            'title' => $request->input('title'),
            'title_class' => $request->input('title_class'),
            'link_class' => $request->input('link'),
            'striping' => $striping,
            'deleting' => $request->input('deleting'),
            'image_dom' => $request->input('image_dom'),
            'description_class' => $request->input('description_class'),
            'image_class' => $request->input('image_class'),
            'body_class' => $request->input('body_class'),
            'target_box' => $request->input('target_box'),
            'link_pattern' => $request->input('link_pattern'),
            'type' => $request->input('type'),
            'status' => $status
        ]);


        if ($feed->save()) {

            $category = $this->connect_object_category_via_request($feed, $request);


           
            DB::commit();
            toast(__('site.done'), 'success');
            return back();
        } else {
            DB::rollBack();
            toast(__('site.failed'), 'error');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $feed = Feed::findOrFail($id);
        $feed->delete();
        if ($feed->trashed()) {
            toast('success', 'حذف شد');
            return back();
        } else {
            toast('error', 'ناموفق بوده!');
            return back();
        }

    }

    public function fill()
    {


        $feeds = Feed::latest()->where('status', Status::CONFIRMED)->get();

        if (isset($feeds) && !empty($feeds) && count($feeds) > 0) {
            foreach ($feeds as $feed) {
                // FillFeed::dispatch($feed);
                 $this->fillFeed($feed);




            }
            toast(__('site.done'), 'success');
            return back();
        }


    }

}

