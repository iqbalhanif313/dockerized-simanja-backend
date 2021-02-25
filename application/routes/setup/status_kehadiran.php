<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['namespace' => 'Setup', 'prefix' => 'api'], function ($router) {
    $router->get('/setup/status-kehadiran', 'StatusKehadiranController@index');
    $router->get('/setup/status-kehadiran/{id}', 'StatusKehadiranController@show');
    $router->post('/setup/status-kehadiran', 'StatusKehadiranController@store');
    $router->put('/setup/status-kehadiran/{id}', 'StatusKehadiranController@update');
    $router->delete('/setup/status-kehadiran/{id}', 'StatusKehadiranController@delete');
    $router->get('/ref/setup/status-kehadiran', 'StatusKehadiranController@getRef');
});
