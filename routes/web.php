<?php
use App\Http\Controllers\inalto\HomeController as Home;
use App\Http\Controllers\Admin\AuditLogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContentCategoryController;
use App\Http\Controllers\Admin\ContentPageController;
use App\Http\Controllers\Admin\ContentTagController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\NewsCategoryController;
use App\Http\Controllers\Admin\NewsTagController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PoiController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



//use App\Http\Controllers\inalto\HomeController;

Route::get('/test',[HomeController::class, 'index']);

Route::redirect('/', '/login');

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
    Route::post('content-pages/media', [ContentPageController::class, 'storeMedia'])->name('content-pages.storeMedia');
    Route::resource('content-pages', ContentPageController::class, ['except' => ['store', 'update', 'destroy']]);

    // Audit Logs
    Route::resource('audit-logs', AuditLogController::class, ['except' => ['store', 'update', 'destroy', 'create', 'edit']]);

    // Report
    Route::post('reports/media', [ReportController::class, 'storeMedia'])->name('reports.storeMedia');
    Route::resource('reports', ReportController::class, ['except' => ['store', 'update', 'destroy']]);

    // Tag
    Route::resource('tags', TagController::class, ['except' => ['store', 'update', 'destroy']]);

    // Poi
    Route::resource('pois', PoiController::class, ['except' => ['store', 'update', 'destroy']]);

    // Category
    Route::resource('categories', CategoryController::class, ['except' => ['store', 'update', 'destroy']]);

    // Post
    Route::post('posts/media', [PostController::class, 'storeMedia'])->name('posts.storeMedia');
    Route::resource('posts', PostController::class, ['except' => ['store', 'update', 'destroy']]);

    // News Tag
    Route::resource('news-tags', NewsTagController::class, ['except' => ['store', 'update', 'destroy']]);

    // News Category
    Route::resource('news-categories', NewsCategoryController::class, ['except' => ['store', 'update', 'destroy']]);
});

// Social Login Routes..
Route::get('login/{driver}', 'Auth\LoginController@redirectToSocial')->name('auth.login.social');
Route::get('{driver}/callback', 'Auth\LoginController@handleSocialCallback')->name('auth.login.social_callback');
