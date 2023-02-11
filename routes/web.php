<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::namespace('Admin')->prefix('/panel')->middleware(['auth'])->group(function () {
    
    
    Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');






         $exitCode = Artisan::call('route:clear');
         $exitCode = Artisan::call('view:clear');


    // return what you want
    return back();
})->name('clear.cache');



    Route::get('/', 'PanelController@index')->name('admin.panel');

    Route::get('panel/status/{id}/{model}', 'PanelController@status')->name('panel.change.status');

    Route::post('/upload-image', 'PanelController@upload_image')->name('admin.panel.uploadimage');
    Route::get('/redesign_image', 'PanelController@redesign_image')->name('admin.panel.redesign_image');
    Route::resource('roles', 'RoleController');
    Route::get('roles/permission/{id}', 'RoleController@permissions')->name('role-permissions.index');
    Route::post('roles/permission/update', 'RoleController@permissionsUpdate')->name('roles-permissions.update');
    Route::resource('users', 'UserController');


    Route::namespace('Advertisment')->group(function () {
        Route::resource('advertisement-types', 'AdvertisementTypeController');
        Route::resource('advertisements', 'AdvertisementController');
        Route::resource('ads-tariffs', 'AdsTariffsController');

    });

    Route::namespace('Region')->group(function () {

        Route::resource('regions', 'RegionController');


    });



    Route::namespace('Announcement')->group(function () {
        Route::resource('annonucements', 'AnnouncementController');
    });

    Route::namespace('Bookmark')->group(function () {
        Route::get('/bookmarks', 'BookmarkController@index')->name('bookmarks.index');
        Route::delete('/bookmarks/{bookmark}', 'BookmarkController@destroy')->name('bookmarks.destroy');
    });

    Route::namespace('Category')->group(function () {

        Route::resource('categories', 'CategoryController');
    });

    Route::namespace('Club')->group(function () {

        Route::resource('clubs', 'ClubController');
    });

    Route::namespace('Comment')->group(function () {

        Route::get('/comments', 'CommentController@index')->name('comments.index');
        Route::delete('/comments/{comment}', 'CommentController@destroy')->name('comments.destroy');
    });

    Route::namespace('Connection')->group(function () {

        Route::resource('connections', 'ConnectionController');
    });

    Route::namespace('ContentManagement')->group(function () {

        Route::resource('content-types', 'ContentTypeController');
        Route::get('content-type/shopping', 'ContentTypeController@shop')->name('content-types.shop');
        Route::resource('contents', 'ContentController');
    });

    Route::namespace('Faq')->group(function () {

        Route::resource('faqs', 'FaqController');

    });

    Route::namespace('Feed')->group(function () {
        Route::resource('feeds', 'FeedController');
        Route::get('feed/fill', 'FeedController@fill')->name('feeds.fill');
    });

    Route::namespace('File')->group(function () {

        Route::resource('files', 'FileController');
        Route::get('filemanager/files', 'FileController@filemanager')->name('file.filemanager');

    });

//    Route::namespace('Finance')->group(function () {
//        Route::get('/', 'FinanceController@index');
//    });

    Route::namespace('Gallery')->group(function () {

        Route::resource('galleries', 'GalleryController');
        Route::get('filemanager/galleries', 'GalleryController@filemanager')->name('gallery.filemanager');
    });


    Route::namespace('Icon')->group(function () {

        Route::resource('icons', 'IconController');
        Route::get('filemanager/icons', 'IconController@filemanager')->name('icon.filemanager');
    });


    Route::namespace('Journal')->group(function () {
        Route::resource('journals', 'JournalController');
    });



    Route::namespace('Image')->group(function () {

        Route::resource('images', 'ImageController');
        Route::get('filemanager/images', 'ImageController@filemanager')->name('image.filemanager');
    });


    Route::namespace('Language')->group(function () {

        Route::resource('langs', 'LangController');
        Route::resource('words', 'WordController');
        Route::resource('word-groups', 'WordGroupController');
        Route::resource('translates', 'TranslateController');



    /* Create Group Word */

    Route::get('word/group/create', 'WordController@groupCreate')->name('words.group.create');
    Route::post('word/group/store', 'WordController@groupStore')->name('words.group.store');


 Route::get('rewords/group/create', 'WordController@regroupCreate')->name('rewords.group.create');
    Route::post('rewords/group/store', 'WordController@regroupStore')->name('rewords.group.store');

    /* Edit Group Translate */

    Route::get('translate/group/edit', 'TranslateController@groupEdit')->name('translates.group.edit');
    Route::post('translate/group/update', 'TranslateController@groupUpdate')->name('translates.group.update');
    });
        Route::namespace('Orderment')->group(function () {

        Route::get('/checkout/index/', 'OrdermentController@checkout')->name('checkout.index');


});


Route::namespace('Like')->group(function () {

    Route::get('/likes', 'LikeController@index')->name('likes.index');
    Route::delete('/likes/{like}', 'LikeController@destroy')->name('likes.destroy');

});


//Route::namespace('Log')->group(function () {
//    Route::get('/', 'LogController@index');
//});
//

Route::namespace('Menu')->group(function () {
    Route::resource('menus', 'MenuController');
    Route::resource('menu-items', 'MenuItemController');
});


Route::namespace('News')->group(function () {

    Route::resource('articles', 'ArticleController');
    Route::post('articles/deleteall', 'ArticleController@deleteAll')->name('articles.deleteall');
    Route::resource('article-categories', 'ArticleCategoryController');
    Route::resource('article-types', 'ArticleTypeController');
    Route::resource('article-origins', 'ArticleOriginController');
    Route::resource('article-positions', 'ArticlePositionController');
    Route::post('article/multijob', 'ArticlePositionController@multijob')->name('articles.multijob');
});


//Route::namespace('Newsletter')->group(function () {
//    Route::get('/', 'NewsletterController@index');
//});


Route::namespace('Newspaper')->group(function () {

    Route::resource('newspapers', 'NewspapersController');
    Route::resource('newspaper-types', 'NewspaperTypesController');

});

/* Theme Routes */
    Route::namespace('Theme')->group(function () {

        Route::resource('themes', 'ThemeController');


    });



//Route::namespace('Optimize')->group(function () {
//    Route::get('/', 'OptimizeController@index');
//});





Route::namespace('Page')->group(function () {
    Route::resource('pages', 'PageController');
});
//Route::namespace('Payment')->group(function () {
//    Route::get('/', 'PaymentController@index');
//});
Route::namespace('Plan')->group(function () {
    /* Page Routes */
    Route::resource('plans', 'PlanController');
    Route::get('plans/show/items', 'PlanController@show_plans')->name('plans.show.items');
    Route::resource('plots', 'PlotController');

});
Route::namespace('Podcast')->group(function () {
    Route::resource('podcasts', 'PodcastController');
    Route::get('filemanager/podcasts', 'PodcastController@filemanager')->name('podcast.filemanager');

});
//Route::namespace('Poll')->group(function () {
//    Route::get('/', 'PollController@index');
//});
Route::namespace('Position')->group(function () {

    Route::resource('positions', 'PositionController');
});
Route::namespace('Portofolio')->group(function () {

    Route::resource('portofolios', 'PortofolioController');
    Route::resource('portofolio-categories', 'PortofolioCategoryController');
});
Route::namespace('Rating')->group(function () {

    Route::get('/ratings', 'RatingController@index')->name('ratings.index');
    Route::delete('/ratings/{rating}', 'RatingController@destroy')->name('ratings.destroy');
});
Route::namespace('Resume')->group(function () {

    Route::resource('resumes', 'ResumeController');
});
//Route::namespace('Rss')->group(function () {
//    Route::get('/', 'RssController@index');
//});
Route::namespace('Sale')->group(function () {

    Route::resource('sales', 'SaleController');
    Route::resource('trackings', 'TrackingController');
    Route::resource('invoices', 'InvoiceController');
});
//Route::namespace('Search')->group(function () {
//
//    Route::get('/', 'SearchController@index');
//});
Route::namespace('Service')->group(function () {

    Route::resource('services', 'ServiceController');

});
Route::namespace('Setting')->group(function () {
    Route::resource('generals', 'GeneralController');
    Route::resource('general-items', 'GeneralItemController');

    Route::get('general-items/create/group', 'GeneralItemController@create_bunch')->name('general-items.bunch.create');
    Route::post('general-items/store/group', 'GeneralItemController@store_bunch')->name('general-items.bunch.store');


    Route::get('general-items/edit/group', 'GeneralItemController@edit_bunch')->name('general-items.bunch.edit');
    Route::post('general-items/update/group', 'GeneralItemController@update_bunch')->name('general-items.bunch.update');


    Route::post('general-items/get-input', 'GeneralItemController@get_general_input')->name('general-items.input');
});
//Route::namespace('Shop')->group(function () {
//
//    Route::get('/', 'ShopController@index');
//
//});
Route::namespace('Skill')->group(function () {
    Route::resource('skills', 'SkillController');
});
Route::namespace('Slider')->group(function () {

    Route::resource('sliders', 'SliderController');
});
Route::namespace('Social')->group(function () {

    Route::resource('socials', 'SocialController');
});
Route::namespace('Tag')->group(function () {

    Route::resource('tags', 'TagController');
    Route::get('tag/automate', 'TagController@automate')->name('tags.automate');
    Route::post('tag/automate/save', 'TagController@automate_store')->name('tags.automate.store');

});
    Route::namespace('Contact')->group(function () {

        Route::resource('contacts', 'ContactController');

    });





//Route::namespace('Team')->group(function () {
//    Route::get('/', 'TeamController@index');
//});
Route::namespace('Techno')->group(function () {

    Route::resource('cases', 'CaseController');
    Route::resource('technologies', 'TechnologyController');
});
//Route::namespace('Template')->group(function () {
//
//    Route::get('/', 'TemplateController@index');
//});
Route::namespace('Ticket')->group(function () {

    Route::resource('departments', 'DepartmentController');
    Route::resource('tickets', 'TicketController');
    Route::post('tickets/make', 'TicketController@create_new')->name('tickets.make');

});
//Route::namespace('Trend')->group(function () {
//    Route::get('/', 'TrendController@index');
//});
Route::namespace('User')->group(function () {

    Route::resource('cutcos', 'CutCoController');
    Route::get('cutcos/confirm/{id}', 'CutCoController@confirm')->name('cutcos.confirm');

    Route::resource('certificates', 'CertificateController');
    Route::post('certificates/confirm/sent', 'CertificateController@confirm')->name('certificates.confirm');
});
Route::namespace('Video')->group(function () {

    Route::resource('videos', 'VideoController');
    Route::get('filemanager/videos', 'VideoController@filemanager')->name('video.filemanager');
});

/* Vote*/
//Route::namespace('Vote')->group(function () {
//
//    Route::get('/', 'VoteController@index');
//
//});

/* Testimonial */
Route::namespace('Testimonial')->group(function () {
    Route::resource('testimonials', 'TestimonialController');

});

Route::resource('helpers', 'HelperController');
Route::get('helper/seller/index', 'HelperController@seller_index')->name('helpers.sellers.index');
Route::get('helper/article/{article}', 'HelperController@seller_helper')->name('helpers.sellers.single');
Route::resource('favoriotes', 'FavorioteController');
Route::get('user/permission/{id}', 'UserController@permissions')->name('user-permissions.index');
Route::patch('users/change/permission/{user}', 'UserController@permissionsUpdate')->name('users-permissions.update');
Route::get('users/roles/{id}', 'UserController@roles')->name('user-roles.index');
Route::patch('users/change/role/{user}', 'UserController@rolesUpdate')->name('users-roles.update');
Route::get('user/change-password/{id}', 'UserController@changePassword')->name('users.change-password');
Route::patch('user/change/{user}', 'UserController@change')->name('users.change');
Route::resource('permissions', 'PermissionController');

Route::get('permission/group/edit', 'PermissionController@groupEdit')->name('permission.edit.group');
Route::post('permission/group/update', 'PermissionController@groupUpdate')->name('permission.update.group');
Route::get('permission/recovery', 'PermissionController@permissionRecover')->name('permission.recover');
Route::get('users/sub/marketers', 'UserController@marketer')->name('users.marketer.index');
Route::get('users/personal/card/{id}', 'UserController@personal')->name('users.personal.cart');

Route::resource('newsletters', 'NewsletterController');

//Route::resource('contacts', 'ContactController');

/* NewsLetter Routes */


/*  Reports */
Route::get('reports/marketers', 'ReportController@marketers')->name('reports.marketers');
Route::post('reports/marketers', 'ReportController@report_marketer')->name('reports.marketers.report');
Route::get('reports/products', 'ReportController@products')->name('reports.products');
Route::post('reports/products', 'ReportController@report_products')->name('reports.products.report');


Route::get('import/abstracts/index', 'ImportController@abstracts')->name('import.abstract.index');
Route::get('export/abstracts', 'ImportController@export_abstract')->name('export.abstract.excel');
Route::post('import/abstracts/file', 'ImportController@import_abstract')->name('import.abstract.excel');

});


Route::namespace('Auth')->prefix('/')->group(function () {
    Route::get('/logout', 'LoginController@logout')->name('auth.logout');




    Route::get('/login', 'LoginController@login')->name('login');
    Route::get('/forget', 'LoginController@logout')->name('auth.logout');
    Route::get('/reload-captcha', 'CaptchaController@reloadCaptcha')->name('captcha.reload');
    Route::get('/auth/google/callback', 'LoginController@callback')->name('auth.google.callback');
    Route::get('auth/google', 'LoginController@redirectToGoogle')->name('auth.google');

});


Route::prefix('/')->group(function () {


    Auth::routes();

    Route::post('/register/verify/code', 'Auth\RegisterController@verify_code')->name('auth.register.verify');
    Route::post('/login/verify/account', 'Auth\RegisterController@continue_account')->name('auth.continue.please');
    Route::post('/register/choose/account', 'Auth\RegisterController@accounting')->name('auth.register.account');
    Route::post('/register/choose/person', 'Auth\RegisterController@person')->name('auth.register.person');
    Route::post('/register/person/real', 'Auth\RegisterController@real_submit')->name('auth.register.real');
    Route::post('/register/person/legal', 'Auth\RegisterController@legal_submit')->name('auth.register.legal');
    Route::get('/register/contract/', 'Auth\RegisterController@contract')->name('auth.register.contract');
    Route::post('/register/contract/agreement/', 'Auth\RegisterController@agreement')->name('auth.register.agreement');
    Route::post('/register/state/', 'Auth\RegisterController@get_state')->name('auth.register.state');
    Route::post('/register/city/', 'Auth\RegisterController@get_city')->name('auth.register.city');
    Route::get('/password/reset', 'Auth\PasswordResetController@reset_page')->name('auth.password.reset');
    Route::post('/password/reset/email', 'Auth\PasswordResetController@email_set')->name('auth.password.email');
    Route::post('/password/reset/verify', 'Auth\PasswordResetController@verify_code')->name('auth.password.verify');
    Route::post('/password/reset/change', 'Auth\PasswordResetController@change_password')->name('auth.password.change');
    Route::get('/password/reset/changes', 'Auth\PasswordResetController@change_password_edit')->name('auth.password.changes');


});

Route::namespace('Client')->group(function () {


    Route::get('/', 'SiteController@index')->name('site.index');
    Route::get('/search/news/', 'SiteController@search')->name('site.search');
    Route::get('/archive', 'SiteController@blog')->name('site.blog');
    Route::get('/sitemaps', 'SiteController@sitemap')->name('site.sitemap');
    Route::get('/loader', 'SiteController@loader')->name('site.loader');
    Route::get('/rss_generator', 'SiteController@rss_generator')->name('site.rss.generator');
    Route::get('/portofolios', 'SiteController@portofolios')->name('site.portofolios');
    Route::get('/videos', 'SiteController@videos')->name('site.videos');
    Route::get('/pictures', 'SiteController@images')->name('site.images');
    Route::get('/translate', 'SiteController@translate')->name('site.translate');
    Route::get('/about', 'SiteController@about')->name('site.about');
    Route::get('/contact', 'SiteController@contact')->name('site.contact');
    Route::post('/contact/save', 'SiteController@contactSave')->name('site.contact.save');
    Route::get('/{slug}', 'SiteController@slugger')->name('site.slugger');

    Route::namespace('Basket')->group(function () {

        Route::post('/basket/add/', 'BasketController@add')->name('basket.add');
        Route::get('/cart/index/', 'BasketController@index')->name('cart.index');
        Route::get('/cart/remove/{id}', 'BasketController@remove_basket')->name('basket.remove');
        Route::post('/cart/update', 'BasketController@update_basket_count')->name('basket.update.count');
    });

    Route::post('/bookmark/save', 'BookmarkController@store')->name('site.bookmark.save');



    Route::post('/comment/save', 'CommentController@store')->name('site.comment.save');

Route::namespace('Like')->group(function () {
    Route::post('/like/save', 'LikeController@store')->name('site.like.save');
});

    Route::post('/rating/save', 'RatingController@store')->name('site.rating.save');


});



Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
