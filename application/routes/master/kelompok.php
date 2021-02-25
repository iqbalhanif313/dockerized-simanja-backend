<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['namespace' => 'Master', 'prefix' => 'api'], function ($router) {
    $router->get('master/kelompok', 'KelompokController@index');
    $router->get('master/kelompok/{id}', 'KelompokController@show');
    $router->post('master/kelompok', 'KelompokController@store');
    $router->put('master/kelompok/{id}', 'KelompokController@update');
    $router->get('/ref/master/kelompok', 'KelompokController@getRef');
});
