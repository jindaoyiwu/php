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

});
