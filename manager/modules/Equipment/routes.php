<?php

use Illuminate\Routing\Router;

Route::group([
    'prefix' => 'admin/equipment',
    'namespace' => 'Modules\\Equipment\\Controllers',
    'middleware' => [
        'web',
        'admin'
    ],
], function (Router $router) {
    $router->get('quarterly-declarations', 'EquipmentController@index');
    $router->put('quarterly-declarations/{id}', 'EquipmentController@lineEdit');
    $router->get('quarterly-declarations/create', 'EquipmentController@edit');
    $router->post('quarterly-declarations/save', 'EquipmentController@save');
});
