<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Content Categories
    Route::apiResource('content-categories', 'ContentCategoryApiController');

    // Content Tags
    Route::apiResource('content-tags', 'ContentTagApiController');

    // Content Pages
    Route::post('content-pages/media', 'ContentPageApiController@storeMedia')->name('content-pages.storeMedia');
    Route::apiResource('content-pages', 'ContentPageApiController');

    // Reports
    Route::post('reports/media', 'ReportsApiController@storeMedia')->name('reports.storeMedia');
    Route::apiResource('reports', 'ReportsApiController');

    // News Posts
    Route::post('news-posts/media', 'NewsPostApiController@storeMedia')->name('news-posts.storeMedia');
    Route::apiResource('news-posts', 'NewsPostApiController');

    // News Categories
    Route::apiResource('news-categories', 'NewsCategoryApiController');

    // News Tags
    Route::apiResource('news-tags', 'NewsTagApiController');

    // Reports Tags
    Route::apiResource('reports-tags', 'ReportsTagApiController');

    // Reports Categories
    Route::post('reports-categories/media', 'ReportsCategoryApiController@storeMedia')->name('reports-categories.storeMedia');
    Route::apiResource('reports-categories', 'ReportsCategoryApiController');

    // Pois
    Route::post('pois/media', 'PoiApiController@storeMedia')->name('pois.storeMedia');
    Route::apiResource('pois', 'PoiApiController');
});
