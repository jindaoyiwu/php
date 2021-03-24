<?php

use Illuminate\Routing\Router;

Route::group([
    'prefix' => 'admin/woChuang',
    'namespace' => 'Modules\\WoChuang\\Controllers',
    'middleware' => [
        'web',
        'admin'
    ],
], function (Router $router) {
    $router->get('/index', 'IndexController@index');
    $router->post('/index/save', 'IndexController@save');
    $router->get('/navigation', 'NavigationController@index');
    $router->post('/navigation/save', 'NavigationController@save');
    $router->get('/news', 'NewsController@index');
    $router->post('/news/save', 'NewsController@save');
});
Route::get('/welcome', function () {
    return view('welcome');
});

Route::group([
    'prefix' => 'front/woChuang',
    'namespace' => 'Modules\\WoChuang\\Controllers',
    'middleware' => [
        'web',
    ],
], function (Router $router) {
    $router->get('/index', 'FrontIndexController@index');
    $router->post('/index/save', 'IndexController@save');
    $router->get('/navigation', 'NavigationController@index');
    $router->post('/navigation/save', 'NavigationController@save');
    $router->get('/news', 'NewsController@index');
    $router->post('/news/save', 'NewsController@save');
});
