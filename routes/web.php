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



