<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['namespace' => 'Setup', 'prefix' => 'api'], function ($router) {
    $router->get('/setup/level', 'LevelController@index');
    $router->get('/setup/level/{id}', 'LevelController@show');
    $router->post('/setup/level', 'LevelController@store');
    $router->put('/setup/level/{id}', 'LevelController@update');
    $router->delete('/setup/level/{id}', 'LevelController@delete');
    $router->get('/ref/setup/level', 'LevelController@getRef');
});
