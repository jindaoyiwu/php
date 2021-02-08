<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->get('/test', 'HomeController@test')->name('test');

    $router->get('quarterly-declarations', 'EquipmentController@index');
    $router->get('quarterly-declarations/create', 'EquipmentController@edit');

});

