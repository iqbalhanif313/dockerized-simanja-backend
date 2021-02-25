<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['namespace' => 'Setup', 'prefix' => 'api'], function ($router) {
    $router->get('/setup/provinsi', 'ProvinsiController@index');
    $router->get('/setup/provinsi/{id}', 'ProvinsiController@show');
    $router->post('/setup/provinsi', 'ProvinsiController@store');
    $router->put('/setup/provinsi/{id}', 'ProvinsiController@update');
    $router->delete('/setup/provinsi/{id}', 'ProvinsiController@delete');
    $router->get('/ref/setup/provinsi', 'ProvinsiController@getRef');
});
