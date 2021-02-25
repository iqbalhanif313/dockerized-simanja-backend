<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['namespace' => 'Setup', 'prefix' => 'api'], function ($router) {
    $router->get('/setup/status-jamaah', 'StatusJamaahController@index');
    $router->get('/setup/status-jamaah/{id}', 'StatusJamaahController@show');
    $router->post('/setup/status-jamaah', 'StatusJamaahController@store');
    $router->put('/setup/status-jamaah/{id}', 'StatusJamaahController@update');
    $router->delete('/setup/status-jamaah/{id}', 'StatusJamaahController@delete');
    $router->get('/ref/setup/status-jamaah', 'StatusJamaahController@getRef');
});
