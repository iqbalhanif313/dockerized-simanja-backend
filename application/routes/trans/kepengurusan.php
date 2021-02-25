<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['namespace' => 'Trans', 'prefix' => 'api'], function ($router) {
    $router->get('/trans/kepengurusan', 'KepengurusanController@index');
    $router->get('/trans/kepengurusan/{id}', 'KepengurusanController@show');
    $router->post('/trans/kepengurusan', 'KepengurusanController@store');
    $router->put('/trans/kepengurusan/{id}', 'KepengurusanController@update');
    $router->delete('/trans/kepengurusan/{id}', 'KepengurusanController@delete');
});
