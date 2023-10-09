<?php

use Encore\Admin\Facades\Admin;
use Illuminate\Routing\Router;
//use App\Admin\Controllers\OrderController;
//use App\Http\Controllers\Admin\HelloController;

//use App\Http\Controllers\Admin\OrderController;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {
    $router->resource('users', UserController::class);
    $router->resource('foods', FoodsController::class);
    $router->resource('food-types', FoodTypeController::class);
    $router->resource('orders', OrderController::class);
    $router->get('/', 'HomeController@index')->name('home');


});
