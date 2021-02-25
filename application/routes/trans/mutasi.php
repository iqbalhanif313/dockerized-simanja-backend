<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['namespace' => 'Trans', 'prefix' => 'api'], function ($router) {
    $router->get('/trans/mutasi', 'MutasiController@index');
});
