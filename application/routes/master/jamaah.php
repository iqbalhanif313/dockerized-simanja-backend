<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['namespace' => 'Master', 'prefix' => 'api'], function ($router) {
    $router->get('master/jamaah', 'JamaahController@index');
    $router->get('master/jamaah/{nik}', 'JamaahController@show');
    $router->post('master/jamaah', 'JamaahController@store');
    $router->put('master/jamaah/{nik}', 'JamaahController@update');
    $router->delete('master/jamaah/{nik}', 'JamaahController@delete');
    $router->get('ref/master/jamaah', 'JamaahController@getRef');
});
