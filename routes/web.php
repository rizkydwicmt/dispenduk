<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Dispenduk */
Route::get('/', 'AdminController@dashboard');

    /* Daftar Penduduk WNI */
$router->group(['prefix' => 'dafduk_wni'], function () use ($router) {
    Route::get('/kk', 'DafdukWNI@kk');
    Route::get('/biodata', 'DafdukWNI@biodata');
    Route::get('/pindah', 'DafdukWNI@pindah');
    Route::get('/datang', 'DafdukWNI@datang');
});

    /* Daftar Penduduk OA */
$router->group(['prefix' => 'dafduk_oa'], function () use ($router) {
    Route::get('/kk', 'DafdukOA@kk');
    Route::get('/biodata', 'DafdukOA@biodata');
    Route::get('/pindah', 'DafdukOA@pindah');
    Route::get('/datang', 'DafdukOA@datang');
});

/* API */
    /* Filter */
Route::post('get_kecamatan', 'Filter@kecamatan');
Route::post('get_kelurahan', 'Filter@kelurahan');

$router->group(['prefix' => 'dafduk_wni'], function () use ($router) {
    /* Daftar Penduduk WNI */
    Route::post('kk_statistik', 'DafdukWNI@statistik_kk');
    Route::post('biodata_statistik', 'DafdukWNI@statistik_biodata');
});