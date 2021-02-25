<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['namespace' => 'Master', 'prefix' => 'api'], function ($router) {
    $router->get('master/kepengurusan', 'KepengurusanController@index');
    $router->get('master/kepengurusan/{id}', 'KepengurusanController@show');
    $router->post('master/kepengurusan', 'KepengurusanController@store');
    $router->put('master/kepengurusan/{id}', 'KepengurusanController@update');
    $router->get('ref/master/kepengurusan', 'KepengurusanController@getRef');
});
