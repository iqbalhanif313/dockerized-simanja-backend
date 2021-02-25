<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['namespace' => 'Setup', 'prefix' => 'api'], function ($router) {
    $router->get('/setup/jenis-kegiatan', 'JenisKegiatanController@index');
    $router->get('/setup/jenis-kegiatan/{id}', 'JenisKegiatanController@show');
    $router->post('/setup/jenis-kegiatan', 'JenisKegiatanController@store');
    $router->delete('/setup/jenis-kegiatan/{id}', 'JenisKegiatanController@delete');
    $router->put('/setup/jenis-kegiatan/{id}', 'JenisKegiatanController@update');
    $router->get('/ref/setup/jenis-kegiatan', 'JenisKegiatanController@getRef');
});
