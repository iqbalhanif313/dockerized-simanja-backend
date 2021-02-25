<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['namespace' => 'Trans', 'prefix' => 'api'], function ($router) {
    $router->get('/trans/presensi', 'PresensiController@index');
    $router->get('/trans/presensi/{id}', 'PresensiController@show');
    $router->get('/trans/presensi/jadwal/{trans_jadwal_id}', 'PresensiController@getByTransJadwalId');
});
