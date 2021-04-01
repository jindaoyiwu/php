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
    $router->post('/news/save', 'NewsController@save');
});

Route::group([
    'prefix' => 'front/woChuang',
    'namespace' => 'Modules\\WoChuang\\Controllers',
    'middleware' => [
        'web',
    ],
], function (Router $router) {
    $router->get('/index', 'FrontIndexController@index');
    $router->get('/page/{name}', 'FrontPageController@index');
    $router->get('/news', 'FrontNewsController@index');
    $router->post('/index/save', 'IndexController@save');
    $router->get('/navigation', 'FrontNavigationController@index');
    $router->post('/navigation/save', 'NavigationController@save');
    $router->post('/news/save', 'NewsController@save');
});
