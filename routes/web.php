<?php

Route::get('/', 'HomeController@index')->name('welcome');
//Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();
Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Content Categories
    Route::delete('content-categories/destroy', 'ContentCategoryController@massDestroy')->name('content-categories.massDestroy');
    Route::resource('content-categories', 'ContentCategoryController');

    // Content Tags
    Route::delete('content-tags/destroy', 'ContentTagController@massDestroy')->name('content-tags.massDestroy');
    Route::resource('content-tags', 'ContentTagController');

    // Content Pages
    Route::delete('content-pages/destroy', 'ContentPageController@massDestroy')->name('content-pages.massDestroy');
    Route::post('content-pages/media', 'ContentPageController@storeMedia')->name('content-pages.storeMedia');
    Route::post('content-pages/ckmedia', 'ContentPageController@storeCKEditorImages')->name('content-pages.storeCKEditorImages');
    Route::resource('content-pages', 'ContentPageController');

    // Reports
    Route::delete('reports/destroy', 'ReportsController@massDestroy')->name('reports.massDestroy');
    Route::post('reports/media', 'ReportsController@storeMedia')->name('reports.storeMedia');
    Route::post('reports/ckmedia', 'ReportsController@storeCKEditorImages')->name('reports.storeCKEditorImages');
    Route::resource('reports', 'ReportsController');

    // News Posts
    Route::delete('news-posts/destroy', 'NewsPostController@massDestroy')->name('news-posts.massDestroy');
    Route::post('news-posts/media', 'NewsPostController@storeMedia')->name('news-posts.storeMedia');
    Route::post('news-posts/ckmedia', 'NewsPostController@storeCKEditorImages')->name('news-posts.storeCKEditorImages');
    Route::resource('news-posts', 'NewsPostController');

    // News Categories
    Route::delete('news-categories/destroy', 'NewsCategoryController@massDestroy')->name('news-categories.massDestroy');
    Route::resource('news-categories', 'NewsCategoryController');

    // News Tags
    Route::delete('news-tags/destroy', 'NewsTagController@massDestroy')->name('news-tags.massDestroy');
    Route::resource('news-tags', 'NewsTagController');

    // Reports Tags
    Route::delete('reports-tags/destroy', 'ReportsTagController@massDestroy')->name('reports-tags.massDestroy');
    Route::resource('reports-tags', 'ReportsTagController');

    // Reports Categories
    Route::delete('reports-categories/destroy', 'ReportsCategoryController@massDestroy')->name('reports-categories.massDestroy');
    Route::post('reports-categories/media', 'ReportsCategoryController@storeMedia')->name('reports-categories.storeMedia');
    Route::post('reports-categories/ckmedia', 'ReportsCategoryController@storeCKEditorImages')->name('reports-categories.storeCKEditorImages');
    Route::resource('reports-categories', 'ReportsCategoryController');

    // Pois
    Route::delete('pois/destroy', 'PoiController@massDestroy')->name('pois.massDestroy');
    Route::post('pois/media', 'PoiController@storeMedia')->name('pois.storeMedia');
    Route::post('pois/ckmedia', 'PoiController@storeCKEditorImages')->name('pois.storeCKEditorImages');
    Route::resource('pois', 'PoiController');

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
    }
});
// Social Login Routes..
Route::get('login/{driver}', 'Auth\LoginController@redirectToSocial')->name('auth.login.social');
Route::get('{driver}/callback', 'Auth\LoginController@handleSocialCallback')->name('auth.login.social_callback');
