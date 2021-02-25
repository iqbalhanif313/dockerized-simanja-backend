<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['namespace' => 'Setup', 'prefix' => 'api'], function ($router) {
    $router->get('/setup/kelurahan', 'KelurahanController@index');
    $router->get('/setup/kelurahan/{id}', 'KelurahanController@show');
    $router->post('/setup/kelurahan', 'KelurahanController@store');
    $router->put('/setup/kelurahan/{id}', 'KelurahanController@update');
    $router->delete('/setup/kelurahan/{id}', 'KelurahanController@delete');
    $router->get('/ref/setup/kelurahan', 'KelurahanController@getRef');
    $router->get('/ref/setup/kelurahan/{kec}', 'KelurahanController@getFRef');
});
