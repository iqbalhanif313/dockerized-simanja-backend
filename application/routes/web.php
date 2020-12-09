<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return "Sistem Management Jamaah @Suteng 2020";
});
$router->get('/ping', function () use ($router) {
    return "ping success";
});
$router->post('/login', 'AuthController@login');
$router->post('/register', 'AuthController@register');


$router->group([
    'middleware' => 'auth',
], function ($router) {
    $router->post('/logout', 'AuthController@logout');
    $router->get('/info', 'BasicController@info');
    $router->get('/showJamaah', 'JamaahController@show');
    $router->post('/createJamaah', 'JamaahController@create');
    $router->get('/showStDesa', 'SetupController@showStDesa');
    $router->get('/showStKelompok', 'SetupController@showStKelompok');
    $router->get('/showStKepengurusan', 'SetupController@showStKepengurusan');
});