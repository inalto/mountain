<?php
use App\Http\Controllers\inalto\HomeController as Home;

use App\Http\Controllers\Auth\LoginController;

use Admin\AuditLogController;
use Admin\CategoryController;
use Admin\ContentCategoryController;
use Admin\ContentPageController;
use Admin\ContentTagController;
use App\Http\Controllers\Admin\HomeController;
use Admin\NewsCategoryController;
use Admin\NewsTagController;
use Admin\PermissionController;
use Admin\PoiController;
use Admin\NewsPostController;
use Admin\ReportController;
use Admin\ReportsCategoryController;
use Admin\RoleController;
use Admin\TagController;
use Admin\UserController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
* Frontend
*/

use App\Http\Controllers\Frontend\ReportsController as Report;

//use inalto\HomeController;
Route::mediaLibrary();

Route::get('/',[Home::class, 'index'])->name('home');
Route::get('/relazione/{category?}/{slug?}',[Report::class, 'show'])->name('report.show');

//Route::redirect('/', '/login');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    
    Route::get('/',[HomeController::class, 'index'])->name('home');

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
    Route::post('reports/media', [\App\Http\Controllers\Admin\ReportController::class, 'storeMedia'])->name('reports.storeMedia');

    Route::resource('reports', ReportController::class, ['except' => ['store', 'update', 'destroy']]);

    // Tag
    Route::resource('tags', TagController::class, ['except' => ['store', 'update', 'destroy']]);

    // Poi
    Route::resource('pois', PoiController::class, ['except' => ['store', 'update', 'destroy']]);

    // Category
    Route::resource('categories', ReportsCategoryController::class, ['except' => ['store', 'update', 'destroy']]);

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
