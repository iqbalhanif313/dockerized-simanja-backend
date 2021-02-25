<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['namespace' => 'Setup', 'prefix' => 'api'], function ($router) {
    $router->get('/setup/tipe-mutasi', 'TipeMutasiController@index');
    $router->get('/setup/tipe-mutasi/{id}', 'TipeMutasiController@show');
    $router->post('/setup/tipe-mutasi', 'TipeMutasiController@store');
    $router->put('/setup/tipe-mutasi/{id}', 'TipeMutasiController@update');
    $router->delete('/setup/tipe-mutasi/{id}', 'TipeMutasiController@delete');
    $router->get('/ref/setup/tipe-mutasi', 'TipeMutasiController@getRef');
});
