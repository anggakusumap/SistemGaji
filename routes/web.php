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

Route::get('/', 'Login\LoginControllerr@index')->name('login');
Route::get('/profile', 'Dashboard\DashboardController@index')->name('dashboarduser');

Route::get('/Admin', 'Admin\DashboardAdminControllerr@index')->name('dashboardadmin');
Route::resource('master-pegawai', 'Admin\MasterData\MasterpegawaiControllerr');

Route::prefix('pegawai')
    ->namespace('Pegawai')
    // ->middleware(['auth', 'pegawai'])
    ->group(function(){
        Route::get('/', "DashboardPegawaiController@index")->name('dashboard-admin');
        Route::get('cetak-slip/slip-gaji-{id}.PDF', "DashboardPegawaiController@cetak")->name('cetak-slip');

        // Route::resource('category', 'CategoryController');
        // Route::resource('user', 'UserController');
        // Route::resource('sparepart', 'SparepartController');
        // Route::resource('bengkel', 'BengkelController');

        // Route::resource('keuangan', 'KeuanganController');
    });


