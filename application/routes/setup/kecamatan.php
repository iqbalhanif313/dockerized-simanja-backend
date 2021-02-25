<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['namespace' => 'Setup', 'prefix' => 'api'], function ($router) {
    $router->get('/setup/kecamatan', 'KecamatanController@index');
    $router->get('/setup/kecamatan/{id}', 'KecamatanController@show');
    $router->post('/setup/kecamatan', 'KecamatanController@store');
    $router->put('/setup/kecamatan/{id}', 'KecamatanController@update');
    $router->delete('/setup/kecamatan/{id}', 'KecamatanController@delete');
    $router->get('/ref/setup/kecamatan', 'KecamatanController@getRef');
    $router->get('/ref/setup/kecamatan/{kab}', 'KecamatanController@getFRef');
});
