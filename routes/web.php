<?php

use Admin\AuditLogController;
use Admin\CategoryController;
use Admin\ContentCategoryController;
use Admin\ContentPageController;
/*
* Admin
*/
use Admin\ContentTagController;
use Admin\NewsCategoryController;
use Admin\NewsPostController;
use Admin\NewsTagController;
use Admin\PermissionController;
use Admin\PoiController;
use Admin\ReportController;
use Admin\RoleController;
use Admin\TagController;
use Admin\UserController;
use App\Http\Controllers\Admin\HaveBeenThereController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\DasboardController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\HaveBeenTheresController;
use App\Http\Controllers\Frontend\PoisController;
use App\Http\Controllers\Frontend\ReportsController as Report;
use Illuminate\Support\Facades\Auth;
/*
* Frontend
*/
use Illuminate\Support\Facades\Route;

//use inalto\HomeController;
Route::mediaLibrary();


Route::get('/ml',function(){

    Artisan::call('media-library:regenerate --ids=67753');
    return "ok";
});

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    Route::get('/', [Report::class, 'index'])->name('home');

    Route::view('/info', 'info');

    Route::get('/tag/{tag?}', [Report::class, 'tag'])->name('reports.tag');

    Route::get('/relazioni/{category?}', [Report::class, 'index'])->name('reports');
    Route::get('/relazioni/{category?}/{slug?}/{id?}', [Report::class, 'show'])->name('report.show');

    Route::get('/mio', [DasboardController::class, 'index'])->name('my');
    Route::get('/mio/cisonostato', [HaveBeenTheresController::class, 'my'])->name('my.have-been-there');
    Route::get('/mio/relazioni/{category?}', [Report::class, 'my'])->name('my.reports');
    
    Route::get('/cisonostato/tag/{tag?}', [HaveBeenTheresController::class, 'tag'])->name('havebeentheres.tag');

    Route::get('/cisonostato/{category?}', [HaveBeenTheresController::class, 'index'])->name('have-been-there');
    Route::get('/cisonostato/{id?}/create', [HaveBeenTheresController::class, 'create'])->name('have-been-there.create');
    Route::get('/cisonostato/{id?}/edit', [HaveBeenTheresController::class, 'edit'])->name('have-been-there.edit');

    Route::get('/punti-di-interesse', [PoisController::class, 'index'])->name('pois');
    Route::get('/punti-di-interesse/{slug?}', [PoisController::class, 'show'])->name('poi.show');

    /*
    Route::get('/poi/{category?}', [Report::class, 'index'])->name('poi');
    Route::get('/poi/{category?}/{slug?}/{id?}', [Report::class, 'show'])->name('poi.show');

    Route::get('/news/{category?}', [Report::class, 'index'])->name('news');
    Route::get('/news/{category?}/{slug?}/{id?}', [Report::class, 'show'])->name('news.show');

    Route::get('/have-been-there/{category?}', [Report::class, 'index'])->name('have-been-there');
    Route::get('/have-been-there/{category?}/{slug?}/{id?}', [Report::class, 'show'])->name('have-been-there.show');
    */
});

//Route::redirect('/', '/login');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // Content Category
    Route::resource('content-categories', ContentCategoryController::class, ['except' => ['store', 'update', 'destroy']]);

    // Content Tag
    Route::resource('content-tags', ContentTagController::class, ['except' => ['store', 'update', 'destroy']]);

    // Content Page
    Route::post('content-pages/media', '\App\Http\Controllers\Admin\ContentPageController@storeMedia')->name('content-pages.storeMedia');

    Route::resource('content-pages', ContentPageController::class, ['except' => ['store', 'update', 'destroy']]);

    // Audit Logs
    Route::resource('audit-logs', AuditLogController::class, ['except' => ['store', 'update', 'destroy', 'create', 'edit']]);

    // Report
    Route::resource('reports', ReportController::class, ['except' => ['store', 'update', 'destroy']]);
    Route::post('reports/media', [\App\Http\Controllers\Admin\ReportController::class, 'storeMedia'])->name('reports.storeMedia');

    // Have Been There
    Route::resource('have-been-there', HaveBeenThereController::class, ['except' => ['store', 'update', 'destroy']]);
    Route::post('have-been-there/media', [HaveBeenThereController::class, 'storeMedia'])->name('havebeenthere.storeMedia');

    // Tag
    Route::resource('tags', TagController::class, ['except' => ['store', 'update', 'destroy']]);

    // Poi
    Route::resource('pois', PoiController::class, ['except' => ['store', 'update', 'destroy']]);
    Route::post('pois/media', [\App\Http\Controllers\Admin\PoiController::class, 'storeMedia'])->name('poi.storeMedia');

    // Category
    Route::resource('categories', CategoryController::class, ['except' => ['store', 'update', 'destroy']]);

    // Post

    Route::post('posts/media', [\App\Http\Controllers\Admin\NewsPostController::class, 'storeMedia'])->name('posts.storeMedia');

    Route::resource('news-posts', NewsPostController::class, ['except' => ['store', 'update', 'destroy']]);

    // News Tag
    Route::resource('news-tags', NewsTagController::class, ['except' => ['store', 'update', 'destroy']]);

    // News Category
    Route::resource('news-categories', NewsCategoryController::class, ['except' => ['store', 'update', 'destroy']]);
});

// Social Login Routes..

Route::get('/login/{provider}', [LoginController::class, 'redirectToProvider'])
    ->name('social.login');
Route::get('/login/{provider}/callback', [LoginController::class, 'handleProviderCallback'])
    ->name('social.callback');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');
