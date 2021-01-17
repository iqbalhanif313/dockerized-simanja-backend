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

    //master data
    $router->get('master/jamaah', 'Master\JamaahController@index');
    $router->get('master/jamaah/{id}', 'Master\JamaahController@show');
    $router->post('master/jamaah', 'Master\JamaahController@store');

    $router->get('master/kegiatan', 'Master\KegiatanController@index');
    $router->get('master/kegiatan/{id}', 'Master\KegiatanController@show');
    $router->post('master/kegiatan', 'Master\KegiatanController@store');
    $router->put('master/kegiatan/{id}', 'Master\KegiatanController@update');

    $router->get('master/kelompok', 'Master\KelompokController@index');
    $router->get('master/kelompok/{id}', 'Master\KelompokController@show');
    $router->post('master/kelompok', 'Master\KelompokController@store');
    $router->put('master/kelompok/{id}', 'Master\KelompokController@update');

    $router->get('master/kepengurusan', 'Master\KepengurusanController@index');
    $router->get('master/kepengurusan/{id}', 'Master\KepengurusanController@show');
    $router->post('master/kepengurusan', 'Master\KepengurusanController@store');
    $router->put('master/kepengurusan/{id}', 'Master\KepengurusanController@update');

    //setup
    $router->get('/setup/desa', 'Setup\DesaController@index');
    $router->get('/setup/desa/{id}', 'Setup\DesaController@show');
    $router->post('/setup/desa', 'Setup\DesaController@store');
    $router->put('/setup/desa/{id}', 'Setup\DesaController@update');
    $router->delete('/setup/desa/{id}', 'Setup\DesaController@delete');

    $router->get('/setup/status-jamaah', 'Setup\StatusJamaahController@index');
    $router->get('/setup/status-jamaah/{id}', 'Setup\StatusJamaahController@show');
    $router->post('/setup/status-jamaah', 'Setup\StatusJamaahController@store');
    $router->put('/setup/status-jamaah/{id}', 'Setup\StatusJamaahController@update');
    $router->delete('/setup/status-jamaah/{id}', 'Setup\StatusJamaahController@delete');

    $router->get('/setup/level', 'Setup\LevelController@index');
    $router->get('/setup/level/{id}', 'Setup\LevelController@show');
    $router->post('/setup/level', 'Setup\LevelController@store');
    $router->put('/setup/level/{id}', 'Setup\LevelController@update');
    $router->delete('/setup/level/{id}', 'Setup\LevelController@delete');
    
    $router->get('/setup/provinsi', 'Setup\ProvinsiController@index');
    $router->get('/setup/provinsi/{id}', 'Setup\ProvinsiController@show');
    $router->post('/setup/provinsi', 'Setup\ProvinsiController@store');
    $router->put('/setup/provinsi/{id}', 'Setup\ProvinsiController@update');
    $router->delete('/setup/provinsi/{id}', 'Setup\ProvinsiController@delete');

    $router->get('/setup/kategori-jamaah', 'Setup\KategoriJamaahController@index');
    $router->get('/setup/kategori-jamaah/{id}', 'Setup\KategoriJamaahController@show');
    $router->post('/setup/kategori-jamaah', 'Setup\KategoriJamaahController@store');
    $router->put('/setup/kategori-jamaah/{id}', 'Setup\KategoriJamaahController@update');
    $router->delete('/setup/kategori-jamaah/{id}', 'Setup\KategoriJamaahController@delete');

    $router->get('/setup/jenis-kegiatan', 'Setup\JenisKegiatanController@index');
    $router->get('/setup/jenis-kegiatan/{id}', 'Setup\JenisKegiatanController@show');
    $router->post('/setup/jenis-kegiatan', 'Setup\JenisKegiatanController@store');
    $router->delete('/setup/jenis-kegiatan/{id}', 'Setup\JenisKegiatanController@delete');
    $router->put('/setup/jenis-kegiatan/{id}', 'Setup\JenisKegiatanController@update');

    $router->get('/setup/kabupaten', 'Setup\KabupatenController@index');
    $router->get('/setup/kabupaten/{st_provinsi_id}', 'Setup\KabupatenController@filter');
    
    $router->get('/setup/kecamatan', 'Setup\KecamatanController@index');
    $router->get('/setup/kecamatan/{st_kab_id}', 'Setup\KecamatanController@filter');

    $router->get('/setup/kelurahan', 'Setup\KelurahanController@index');
    $router->get('/setup/kelurahan/{st_kec_id}', 'Setup\KelurahanController@filter');

    
    
    
    $router->get('/setup/status-kehadiran', 'Setup\StatusKehadiranController@index');
    $router->get('/setup/tipe-mutasi', 'Setup\TipeMutasiController@index');

    //transactional
    $router->get('/trans/jadwal', 'Trans\JadwalController@index');
    $router->get('/trans/jadwal/{id}', 'Trans\JadwalController@show');
    $router->post('/trans/jadwal', 'Trans\JadwalController@store');
    $router->put('/trans/jadwal/{id}', 'Trans\JadwalController@update');

    $router->get('/trans/kepengurusan', 'Trans\KepengurusanController@index');
    $router->get('/trans/kepengurusan/{id}', 'Trans\KepengurusanController@show');
    $router->post('/trans/kepengurusan', 'Trans\KepengurusanController@store');
    $router->put('/trans/kepengurusan/{id}', 'Trans\KepengurusanController@update');

    $router->get('/trans/presensi', 'Trans\PresensiController@index');
    $router->get('/trans/presensi/{id}', 'Trans\PresensiController@show');
    $router->get('/trans/presensi/jadwal/{trans_jadwal_id}', 'Trans\PresensiController@getByTransJadwalId');

    $router->get('/trans/mutasi', 'Trans\MutasiController@index');

    //refererence
    $router->get('/ref/jenis-kelamin', 'RefController@getRefJenisKelamin');
});
