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



$router->group([
    'prefix' => 'api',
], function ($router) {
    $router->post('/login', 'AuthController@login');
    $router->post('/register', 'AuthController@register');
});

$router->group([
    'prefix' => 'api',
    // 'middleware' => 'auth',
], function ($router) {
    $router->post('/logout', 'AuthController@logout');
    $router->get('/info', 'BasicController@info');
    $router->get('master/jamaah', 'JamaahController@index');
    $router->post('master/jamaah/store', 'JamaahController@store');
    $router->get('/setup/st-desa', 'SetupController@getStDesa');
    $router->get('/setup/st-kelompok', 'SetupController@getStKelompok');
    $router->get('/setup/st-kepengurusan', 'SetupController@getStKepengurusan');
});
