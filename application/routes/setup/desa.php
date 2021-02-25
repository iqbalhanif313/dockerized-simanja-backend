<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['namespace' => 'Setup', 'prefix' => 'api'], function ($router) {
    $router->get('/setup/desa', 'DesaController@index');
    $router->get('/setup/desa/{id}', 'DesaController@show');
    $router->post('/setup/desa', 'DesaController@store');
    $router->put('/setup/desa/{id}', 'DesaController@update');
    $router->delete('/setup/desa/{id}', 'DesaController@delete');
    $router->get('/ref/setup/desa', 'DesaController@getRef');
});
