<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

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
use App\Traits\Feed\Feeder;



class FillFeed implements ShouldQueue
{
    use Dispatchable, 
    InteractsWithQueue, Queueable, SerializesModels , CategoryHelper, ImageUploader, ImageHelper, RegionHelper ,Feeder ;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $feed;

    public function __construct($feed)
    {
        //
        $this->feed = $feed ;
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
    $feed = $this->feed;
    
    $this->fillFeed($feed);
        
    }
    



}
