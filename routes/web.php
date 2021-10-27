<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

// Login
Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/', 'Auth\LoginController@login')->name('login');

// Akses Admin
Route::group(
    ['middleware' => 'auth'],
    function () {
        Route::get('/admin', 'Admin\DashboardAdminControllerr@index')->name('dashboardadmin');
        Route::resource('master-pegawai', 'Admin\MasterData\MasterpegawaiControllerr');
    }
);

// Akses Pegawai
Route::group(
    ['middleware' => 'auth'],
    function () {
        Route::get('/profile', 'Dashboard\DashboardController@index')->name('dashboarduser');
        Route::prefix('pegawai')
            ->namespace('Pegawai')
            // ->middleware(['auth', 'pegawai'])
            ->group(function () {
                Route::get('/', "DashboardPegawaiController@index")->name('dashboard-admin');
                Route::get('cetak-slip/slip-gaji-{id}.PDF', "DashboardPegawaiController@cetak")->name('cetak-slip');
            });
    }
);

Route::get('/home', 'HomeController@index')->name('home');
