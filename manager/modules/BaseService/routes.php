<?php

use Illuminate\Routing\Router;

Route::group([
    'prefix' => 'admin/baseService',
    'namespace' => 'Modules\\BaseService\\Controllers',
    'middleware' => [
        'web',
        'admin'
    ],
], function (Router $router) {
    $router->get('image/index', 'ImagesController@index');
    $router->get('image/index/create', 'ImagesController@create');
    $router->post('image/save', 'ImagesController@save');

    $router->get('page/index', 'PageController@index');
    $router->get('page/index/create', 'PageController@create');
    $router->get('page/index/{id}/edit', 'PageController@create');
    $router->post('page/save', 'PageController@save');
    $router->post('page/save', 'PageController@save');
});
