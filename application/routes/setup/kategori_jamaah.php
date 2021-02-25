<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['namespace' => 'Setup', 'prefix' => 'api'], function ($router) {
    $router->get('/setup/kategori-jamaah', 'KategoriJamaahController@index');
    $router->get('/setup/kategori-jamaah/{id}', 'KategoriJamaahController@show');
    $router->post('/setup/kategori-jamaah', 'KategoriJamaahController@store');
    $router->put('/setup/kategori-jamaah/{id}', 'KategoriJamaahController@update');
    $router->delete('/setup/kategori-jamaah/{id}', 'KategoriJamaahController@delete');
    $router->get('/ref/setup/kategori-jamaah', 'KategoriJamaahController@getRef');
});
