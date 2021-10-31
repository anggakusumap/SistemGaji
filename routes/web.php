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
        Route::get('/admin/password-change', 'Account\PasswordController@edit')->name('password.change');
        Route::patch('/admin/password-change', 'Account\PasswordController@update')->name('password.change');
        Route::get('/admin', 'Admin\DashboardAdminControllerr@index')->name('dashboardadmin');
        Route::resource('master-pegawai', 'Admin\MasterData\MasterpegawaiControllerr');
        Route::resource('gaji', 'Admin\Penggajian\GajiControllerr');
    }
);

// Akses Pegawai
Route::group(
    ['middleware' => 'auth'],
    function () {

        Route::get('/profile', 'Dashboard\DashboardController@index')->name('dashboarduser');
        Route::get('/pegawai/password-change', 'Account\PasswordPegawaiController@edit')->name('password-pegawai.change');
        Route::patch('/pegawai/password-change', 'Account\PasswordPegawaiController@update')->name('password-pegawai.change');
        Route::prefix('pegawai')
            ->namespace('Pegawai')
            ->middleware(['isAdmin'])
            // ->middleware(['auth', 'pegawai'])
            ->group(function () {
                Route::get('/', "DashboardPegawaiController@index")->name('dashboard-pegawai');
                Route::get('cetak-slip/slip-gaji-{id}.PDF', "DashboardPegawaiController@cetak")->name('cetak-slip');
                Route::get('download-slip/slip-gaji-{id}.PDF', "DashboardPegawaiController@download")->name('download-slip');
                Route::get('test', "DashboardPegawaiController@cetak")->name('tes-cetak');
            });
    }
);
