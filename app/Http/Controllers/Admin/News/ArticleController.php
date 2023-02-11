<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Admin\MainController;
use App\Model\Image\Image;
use App\Rules\NationalCode;
use App\Traits\Breadcrumb;
use App\Traits\Region\RegionHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Traits\Base\BaseRepository;
use App\Traits\Category\CategoryHelper;
use App\Repositories\Connection\ConnectionRepository;
use App\Traits\File\FileHelper;
use App\Traits\Gallery\GalleryHelper;
use App\Traits\Icon\IconHelper;
use App\Traits\Image\ImageHelper;
use App\Model\News\Article;
use App\Repositories\News\ArticleBooleanRepository;
use App\Repositories\News\ArticleDetailRepository;
use App\Traits\News\ArticleDataRepository;
use App\Traits\News\ArticleHelper;
use App\Traits\News\ArticleProducerRepository;
use App\Traits\News\ArticleRepository;
use App\Traits\Podcast\PodcastHelper;
use App\Repositories\Position\PositionRepository;
use App\Traits\Tag\TagHelper;
use App\Traits\Video\VideoHelper;

class ArticleController extends MainController
{
    use BaseRepository,
        ArticleHelper,
        ArticleRepository,
        ArticleProducerRepository,
        ArticleDataRepository,
        TagHelper,
        RegionHelper,
        ImageHelper,
        IconHelper,
        VideoHelper,
        FileHelper,
        GalleryHelper,
        PodcastHelper,
        Breadcrumb,
        CategoryHelper;

    public function __construct()
    {
        $this->repository = new \App\Repositories\News\ArticleRepository();
    }


    public function store(Request $request)
    {


        DB::beginTransaction();
        $request->validate([
            'title' => ['required', 'max:255'],
            'head_title' => ['nullable', 'max:255'],
            'entitle' => ['nullable', 'max:255'],
            'external_link' => ['nullable', 'max:255'],
            'origin_type' => ['nullable', 'numeric'],
            'type' => ['nullable', 'numeric'],
        ]);


        $redirected = $request->input('redirect');

        //  Status
        if (!empty($request->input('status'))) {

            $status = $request->input('status');
        } else {
            $status = 0;
        }


        $data = [
            'head_title' => $request->input('head_title'),
            'footer_title' => $request->input('footer_title'),
            'creator_id' => auth()->id(),
            'updator_id' => null,
            'origin_id' => $request->input('origin_id'),
            'type' => $request->input('article_type'),
            'origin_type' => $request->input('origin_type'),
            'external_link' => $request->input('external_link'),
            'status' => 0,
            'image2' => $request->input('image2'),

        ];
        $article = $this->repository->store($data);

        if ($article) {

            //  Generate Code

            $article_id = sprintf('%09d', $article->id);

            $article->update([
                'code' => $article_id
            ]);

            $article->save();




            $base_data = [
                'title' => $request->input('title'),
                'entitle' => $request->input('entitle'),
                'short' => Str::random(6),
                'description' => $request->input('description'),
                'body' => $request->input('body'),
                'image' => $request->input('image'),
                'baseable_id' => $article->id,
                'baseable_type' => get_class($article),
            ];

            $base_rep = new \App\Repositories\Base\BaseRepository();
            $base = $base_rep->store($base_data);


            $producer_data = [
                'article_id' => $article->id,
                'company' => $request->input('company'),
                'company_id' => is_numeric($request->input('company_id')) ? $request->input('company_id') : null,
                'author' => $request->input('author'),
                'author_id' => is_numeric($request->input('author_id')) ? $request->input('author_id') : null,
                'reporter' => $request->input('reporter'),
                'reporter_id' => is_numeric($request->input('reporter_id')) ? $request->input('reporter_id') : null,
                'photographer' => $request->input('photographer'),
                'photographer_id' => is_numeric($request->input('photographer_id')) ? $request->input('photographer_id') : null,
                'translator' => $request->input('translator'),
                'translator_id' => is_numeric($request->input('translator_id')) ? $request->input('translator_id') : null,
                'writer' => $request->input('writer'),
                'writer_id' => is_numeric($request->input('writer_id')) ? $request->input('writer_id') : null
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


            $boolean_data = $this->articlBooleanByRequest($request, $article);
            $boolean_rep = new ArticleBooleanRepository();
            $boolean_rep->store($boolean_data);


//            $default_image = $request->input('image');
//            $main_image = $request->input('mainimage');



//            $images = [];
//            if (!isset($default_image) || empty($default_image)) {
//              if (isset($main_image) && !empty($main_image)) {
//                  $default_image = $main_image;
//              }
//              else{
//                  $default_image = null;
//              }
//            }
//
//
//
//            if (!isset($main_image) || empty($main_image)) {
//                $main_image = null;
//            }
//
//
//
//
//            if (isset($default_image) && !empty($default_image)) {
//                $image = Image::where('id' , $default_image)->first();
//                $image = $image->src;
//
//
//                $base_image = $base->update([
//                    'image' => $image
//                ]);
//                $base_image->save();
//                if (isset($main_image) && !empty($main_image)) {
//                    $images = [$default_image , $main_image];
//
//                    $main_image = Image::where('id' , $main_image)->first();
//
//                    $main_image = $main_image->src;
//
//
//                    $article->update([
//                        'image' => $main_image
//                    ]);
//
//                    $article->save();
//
//
//                }
//                else {
//                    $images = [$default_image ];
//                }
//
//                $this->attach_images($article, $images);
//
//
//
//
//
//
//
//            }






            $default_video = $request->input('video');
            if (isset($default_video)) {
                $this->attach_videos($article, [$default_video]);
            }


            $default_file = $request->input('file');
            if (isset($default_file)) {
                $this->attach_files($article, [$default_file]);
            }


            $default_file = $request->input('podcast');
            if (isset($default_file)) {
                $this->attach_podcasts($article, [$default_file]);
            }


            $default_file = $request->input('gallery');
            if (isset($default_file)) {
                $this->attach_galleries($article, [$default_file]);
            }

            $default_file = $request->input('icon');

            if (isset($default_file)) {
                $this->attach_icons($article, [$default_file]);
            }


            $category = $this->connect_object_category_via_request($article, $request);
            $tag = $this->connect_object_tag_via_request($article, $request);

            $position_rep = new PositionRepository();
            $position = $position_rep->store_array($article, $request->input('positions'));

            $connection_rep = new ConnectionRepository();
            $connection = $connection_rep->store_array($article, $request->input('connections'));


            DB::commit();
            toast('انجام شد!', 'success');

            if ($redirected == 1) {
                return redirect()->route('articles.edit', $article->id);
            } elseif ($redirected == 2) {
                return redirect()->route('articles.index');
            } else {
                return back();
            }

        } else {

        }


    }
    
    public function deleteAll(Request $request){
       $all =  Article::latest()->get();
        foreach ($all as $art){
            $art->forceDelete();
        }
        
     
            toast(__('site.done'), 'success');

            return back();
        
    }

    public function articlBooleanByRequest(Request $request, $article)
    {
        $comments = $request->input('comments');
        $image_rss = $request->input('image_rss');
        $most_comments = $request->input('most_comments');
        $most_rated = $request->input('most_rated');
        $image = $request->input('image_default');
        $most_viewed = $request->input('most_viewed');
        $view_count = $request->input('view_count');
        $social = $request->input('social');
        $iframe = $request->input('iframe');
        $rss = $request->input('rss');


        $boolean = [
            'article_id' => $article->id,
            'comments' => !empty($comments) && $comments == 'on' ? 1 : 1,
            'image_rss' => !empty($image_rss) && $image_rss == 'on' ? 1 : 0,
            'most_comments' => !empty($most_comments) && $most_comments == 'on' ? 1 : 0,
            'most_rated' => !empty($most_rated) && $most_rated == 'on' ? 1 : 0,
            'image' => !empty($image) && $image == 'on' ? 1 : 0,
            'most_viewed' => !empty($most_viewed) && $most_viewed == 'on' ? 1 : 0,
            'view_count' => !empty($view_count) && $view_count == 'on' ? 1 : 0,
            'social' => !empty($social) && $social == 'on' ? 1 : 0,
            'iframe' => !empty($iframe) && $iframe == 'on' ? 1 : 0,
            'rss' => !empty($rss) && $rss == 'on' ? 1 : 0,
        ];


        return $boolean;

    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
//        DB::beginTransaction();


        $request->validate([
            'title' => ['required'],
        ]);

        if (!empty($request->input('status'))) {

            $status = $request->input('status');
        } else {
            $status = 0;
        }


        $data = [
            'head_title' => $request->input('head_title'),
            'footer_title' => $request->input('footer_title'),
            'updator_id' => auth()->id(),
            'origin_id' => $request->input('origin_id'),
            'type' => $request->input('article_type'),
            'origin_type' => $request->input('origin_type'),
            'external_link' => $request->input('external_link'),
            'image2' => $request->input('image2'),
            'status' => $status,
        ];

        $article = $this->repository->update($id, $data);

        if ($article) {

            $base_data = [
                'title' => $request->input('title'),
                'entitle' => $request->input('entitle'),
                'description' => $request->input('description'),
                'body' => $request->input('body'),
                'image' => $request->input('image'),
            ];
            $base_rep = new \App\Repositories\Base\BaseRepository();
            $base = $base_rep->update($article->base->id, $base_data);


            $producer_data = [

                'article_id' => $article->id,
                'company' => $request->input('company'),
                'company_id' => is_numeric($request->input('company_id')) ? $request->input('company_id') : null,
                'author' => $request->input('author'),
                'author_id' => is_numeric($request->input('author_id')) ? $request->input('author_id') : null,
                'reporter' => $request->input('reporter'),
                'reporter_id' => is_numeric($request->input('reporter_id')) ? $request->input('reporter_id') : null,
                'photographer' => $request->input('photographer'),
                'photographer_id' => is_numeric($request->input('photographer_id')) ? $request->input('photographer_id') : null,
                'translator' => $request->input('translator'),
                'translator_id' => is_numeric($request->input('translator_id')) ? $request->input('translator_id') : null,
                'writer' => $request->input('writer'),
                'writer_id' => is_numeric($request->input('writer_id')) ? $request->input('writer_id') : null

            ];

            $producer_repository = new \App\Repositories\News\ArticleProducerRepository();
            $article_producer = $producer_repository->update($article->producer->id, $producer_data);


            $boolean_data = $this->articlBooleanByRequest($request, $article);
            $boolean_rep = new ArticleBooleanRepository();

            $boolean_rep->update($article->boolean->id, $boolean_data);


//            $default_image = $request->input('image');
//            $this->attach_images($article, [$default_image]);


            $this->set_regions_request($article, $request);


            $default_video = $request->input('video');
            $this->attach_videos($article, [$default_video]);


            $default_file = $request->input('file');
            $this->attach_files($article, [$default_file]);


            $default_file = $request->input('podcast');
            $this->attach_podcasts($article, [$default_file]);


            $default_file = $request->input('gallery');
            $this->attach_galleries($article, [$default_file]);


            $default_file = $request->input('icon');
            $this->attach_icons($article, [$default_file]);


            $category = $this->connect_object_category_via_request($article, $request);


            $tag = $this->connect_object_tag_via_request($article, $request);

            $position_rep = new PositionRepository();
            $position = $position_rep->store_array($article, $request->input('positions'));


            $connection_rep = new ConnectionRepository();
            $connection = $connection_rep->store_array($article, $request->input('connections'));


            DB::commit();
            toast(__('site.done'), 'success');

            return back();


        } else {

        }


    }


    public function show($id)
    {
        $article = Article::findOrFail($id);

        $breadcrumbs = $this->breadcrumb_generator('articles.show');

        return view('module.news.admin.show', compact('article', 'breadcrumbs'));
    }

    public function multijob(Request $request)
    {

        dd($request->all());
    }
}
