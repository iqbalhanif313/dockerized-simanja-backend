<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['namespace' => 'Master', 'prefix' => 'api'], function ($router) {
    $router->get('master/kegiatan', 'KegiatanController@index');
    $router->get('master/kegiatan/{id}', 'KegiatanController@show');
    $router->post('master/kegiatan', 'KegiatanController@store');
    $router->put('master/kegiatan/{id}', 'KegiatanController@update');
    $router->get('ref/master/kegiatan', 'KegiatanController@getRef');
});
