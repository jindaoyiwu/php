<?php

use Illuminate\Routing\Router;

Route::group([
    'prefix' => 'admin/checkOrder',
    'namespace' => 'Modules\\CheckOrder\\Controllers',
    'middleware' => [
        'web',
        'admin'
    ],
], function (Router $router) {
    $router->get('/index', 'OrderController@index');
    $router->get('/bill/index', 'BillController@index');
    $router->get('/delivery/index', 'DeliveryController@index');
    $router->get('/indemnity/index', 'IndemnityController@index');

    $router->get('/index/{id}/edit', 'ForbiddenAntiSpamController@edit');
    $router->get('/index/create', 'ForbiddenAntiSpamController@edit');
    $router->post('/index/save', 'ForbiddenAntiSpamController@save');
    $router->delete('/index/{id}', 'ForbiddenAntiSpamController@del');
    // 禁用词
    $router->get('/index/{auti_spam_id}/edit/create', 'ForbiddenWordController@edit');
    $router->put('/index/{auti_spam_id}/edit/{id}', 'ForbiddenWordController@save');
    $router->delete('/index/{auti_spam_id}/edit/{id}', 'ForbiddenWordController@del');
    $router->get('/word/index/{auti_spam_id}', 'ForbiddenWordController@index');
    $router->get('/word/index/{auti_spam_id}/{id}/edit', 'ForbiddenWordController@edit');
    $router->post('/word/index/save', 'ForbiddenWordController@save');

    // 场景禁用词
    $router->get('/sceneWord/index/{id}/edit', 'ForbiddenSceneWordController@edit');
    $router->post('/sceneWord/index/save', 'ForbiddenSceneWordController@save');

});
