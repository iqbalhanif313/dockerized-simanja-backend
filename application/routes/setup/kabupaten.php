<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['namespace' => 'Setup', 'prefix' => 'api'], function ($router) {
    $router->get('/setup/kabupaten', 'KabupatenController@index');
    $router->get('/setup/kabupaten/{id}', 'KabupatenController@show');
    $router->post('/setup/kabupaten', 'KabupatenController@store');
    $router->put('/setup/kabupaten/{id}', 'KabupatenController@update');
    $router->delete('/setup/kabupaten/{id}', 'KabupatenController@delete');
    $router->get('/ref/setup/kabupaten', 'KabupatenController@getRef');
    $router->get('/ref/setup/kabupaten/{prov}', 'KabupatenController@getFRef');
});
