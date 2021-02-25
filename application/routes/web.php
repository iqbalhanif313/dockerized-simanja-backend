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

$router->group(['prefix' => 'api'], function ($router) {
    $router->post('/login', 'AuthController@login');
    $router->post('/register', 'AuthController@register');
});

$router->group([
    'prefix' => 'api',
    // 'middleware' => 'auth',
], function ($router) {
    $router->post('/logout', 'AuthController@logout');
    $router->get('/info', 'BasicController@info');
    $router->get('/ref/users', 'BasicController@refUsers');
    //refererence
    $router->get('/ref/jenis-kelamin', 'RefController@getRefJenisKelamin');
});

//master data
@include('master/jamaah.php');
@include('master/kegiatan.php');
@include('master/kelompok.php');
@include('master/kepengurusan.php');

//setup
@include('setup/desa.php');
@include('setup/jenis_kegiatan.php');
@include('setup/kabupaten.php');
@include('setup/kategori_jamaah.php');
@include('setup/kecamatan.php');
@include('setup/kelurahan.php');
@include('setup/kepengurusan.php');
@include('setup/level.php');
@include('setup/provinsi.php');
@include('setup/status_jamaah.php');
@include('setup/status_kehadiran.php');
@include('setup/tipe_mutasi.php');

//transactional
@include('trans/jadwal.php');
@include('trans/kepengurusan.php');
@include('trans/mutasi.php');
@include('trans/presensi.php');
