<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', function(){
        return redirect('http://localhost:8000/news/public/admin/auth/logs');
    });
    $router->get('/api/chill-category', 'ChillCategoryController@api')->name('api.chillCategory');

    $router->resource('users', UserController::class);
    $router->resource('news', NewsController::class);
    $router->resource('categorys', CategoryController::class);
    $router->resource('chill-categorys', ChillCategoryController::class);
    $router->resource('authors', AuthorController::class);
    $router->resource('sources', SourceController::class);
    $router->resource('staffs', StaffController::class);

});
