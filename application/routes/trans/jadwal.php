<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['namespace' => 'Trans', 'prefix' => 'api'], function ($router) {
    $router->get('/trans/jadwal', 'JadwalController@index');
    $router->get('/trans/jadwal/{id}', 'JadwalController@show');
    $router->post('/trans/jadwal', 'JadwalController@store');
    $router->put('/trans/jadwal/{id}', 'JadwalController@update');
    $router->delete('/trans/jadwal/{id}', 'JadwalController@delete');
});
