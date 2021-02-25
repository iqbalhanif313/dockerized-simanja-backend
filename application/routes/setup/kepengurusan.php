<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['namespace' => 'Setup', 'prefix' => 'api'], function ($router) {
    $router->get('/setup/kepengurusan', 'KepengurusanController@index');
    $router->get('/setup/kepengurusan/{id}', 'KepengurusanController@show');
    $router->post('/setup/kepengurusan', 'KepengurusanController@store');
    $router->put('/setup/kepengurusan/{id}', 'KepengurusanController@update');
    $router->delete('/setup/kepengurusan/{id}', 'KepengurusanController@delete');
    $router->get('/ref/setup/kepengurusan', 'KepengurusanController@getRef');
});
