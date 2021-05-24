<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\Admin\ReportsTagController;
use App\Http\Controllers\Admin\ReportsCategoryController;
use App\Http\Controllers\Admin\ContentTagController;
use App\Http\Controllers\Admin\ContentPageController;
use App\Http\Controllers\Admin\NewsTagController;
use App\Http\Controllers\Admin\NewsCategoryController;
use App\Http\Controllers\Admin\PoiController;
use App\Http\Controllers\Admin\GlobalSearchController;


use App\Http\Livewire\Inalto\Frontend\Report;
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

Route::get('/', function () {
    return view('home');
})->name('home');

//livewire.inalto.frontend.report
//Route::livewire('/relazione/{slug}','livewire.inalto.frontend.report')->name('reports.show');
//Route::get('/relazione/{slug}',Report::class)->name('reports.show');

Route::get('/relazione/{slug}', function ($slug) {
    return view('report',['slug'=>$slug]);
})->name('reports.show');

//->middleware(['auth'])
//->middleware(['guest','auth'])
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
*/

// Social Login Routes..
Route::get('/login/{provider}', [LoginController::class, 'redirectToProvider'])->name('social.login');
Route::get('/login/{provider}/callback', [LoginController::class, 'handleProviderCallback'])->name('social.callback');

//require __DIR__.'/auth.php';



Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class,'index'])->name('home');

    // Permissions
    Route::delete('permissions/destroy', [PermissionsController::class , 'massDestroy'])->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', [RolesController::class , 'massDestroy'])->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', [UsersController::class,'massDestroy'])->name('users.massDestroy');
    Route::post('users/media', [UsersController::class,'storeMedia'])->name('users.storeMedia');
    Route::post('users/ckmedia', [UsersController::class, 'storeCKEditorImages'])->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');



    // Content Category
    Route::resource('content-categories', 'ContentCategoryController', ['except' => ['store', 'update', 'destroy']]);

    // Content Tag
    Route::resource('content-tags', 'ContentTagController', ['except' => ['store', 'update', 'destroy']]);

    // Content Page
    Route::post('content-pages/media', [ContentPageController::class, 'storeMedia'])->name('content-pages.storeMedia');
    //Route::resource('content-pages', ContentPageController::class, ['except' => ['store', 'update', 'destroy']]);
    Route::resource('content-pages', 'ContentPageController', ['except' => ['store', 'update', 'destroy']]);

 // Reports Categories
 Route::delete('reports-categories/destroy', [ReportsCategoryController::class,'massDestroy'])->name('reports-categories.massDestroy');
 Route::post('reports-categories/media', [ReportsCategoryController::class,'storeMedia'])->name('reports-categories.storeMedia');
 Route::post('reports-categories/ckmedia', [ReportsCategoryController::class,'storeCKEditorImages'])->name('reports-categories.storeCKEditorImages');
 Route::resource('reports-categories', 'ReportsCategoryController');

 // Reports Tags
 Route::delete('reports-tags/destroy', [ReportsTagController::class,'massDestroy'])->name('reports-tags.massDestroy');
 Route::resource('reports-tags', 'ReportsTagController');

       // Reports
       Route::delete('reports/destroy', [ReportsController::class, 'massDestroy'])->name('reports.massDestroy');
       Route::post('reports/media', [ReportsController::class, 'storeMedia'])->name('reports.storeMedia');
       Route::post('reports/ckmedia', [ReportsController::class, 'storeCKEditorImages'])->name('reports.storeCKEditorImages');
       Route::resource('reports', 'ReportsController');
 // News Tags
 Route::delete('news-tags/destroy', [NewsTagController::class,'massDestroy'])->name('news-tags.massDestroy');
 Route::resource('news-tags', 'NewsTagController');

 // News Categories
 Route::delete('news-categories/destroy', [NewsCategoryController::class,'massDestroy'])->name('news-categories.massDestroy');
 Route::resource('news-categories', 'NewsCategoryController');

 // News Posts
 Route::delete('news-posts/destroy', [NewsPostController::class,'massDestroy'])->name('news-posts.massDestroy');
 Route::post('news-posts/media', [NewsPostController::class,'storeMedia'])->name('news-posts.storeMedia');
 Route::post('news-posts/ckmedia', [NewsPostController::class,'storeCKEditorImages'])->name('news-posts.storeCKEditorImages');
 Route::resource('news-posts', 'NewsPostController');

 // Pois
 Route::delete('pois/destroy', [PoiController::class,'massDestroy'])->name('pois.massDestroy');
 Route::post('pois/media', [PoiController::class,'storeMedia'])->name('pois.storeMedia');
 Route::post('pois/ckmedia', [PoiController::class,'storeCKEditorImages'])->name('pois.storeCKEditorImages');
 Route::resource('pois', 'PoiController');

 Route::get('global-search', [GlobalSearchController::class,'search'])->name('globalSearch');

});