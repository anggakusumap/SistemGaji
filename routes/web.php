<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Masterdata\MasterpegawaiControllerr;

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
        Route::get('/admin/password-change', 'Account\PasswordController@edit')->name('password.change')->middleware(['isAdmin']);
        Route::patch('/admin/password-change', 'Account\PasswordController@update')->name('password.change')->middleware(['isAdmin']);
        Route::get('/admin', 'Admin\DashboardAdminControllerr@index')->name('dashboardadmin')->middleware(['isAdmin']);
        Route::resource('master-pegawai', 'Admin\Penggajian\MasterpegawaiControllerr')->middleware(['isAdmin']);
        Route::resource('master-grade', 'Admin\Penggajian\MasterGradeController')->middleware(['isAdmin']);
        Route::resource('gaji', 'Admin\Penggajian\GajiControllerr')->middleware(['isAdmin']);
        Route::post('/gajilain/{id}', 'Admin\Penggajian\GajiControllerr@storepenerimaanlain')->name('tambahpenerimaanlain')->middleware(['isAdmin']);;
        Route::get('/download', 'Admin\Penggajian\GajiControllerr@getFile')->name('download_excel_format');
        Route::get('/gaji/{id}/editdata', 'Admin\Penggajian\GajiControllerr@showedit')->name('gajishowedit')->middleware(['isAdmin']);
        Route::put('/gaji/{id}/updatedata', 'Admin\Penggajian\GajiControllerr@showupdate')->name('gajishowupdate')->middleware(['isAdmin']);
        Route::post('/gaji/{id}/deletedata', 'Admin\Penggajian\GajiControllerr@deletedetail')->name('gajishowdelete')->middleware(['isAdmin']);
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
            // ->middleware(['auth', 'pegawai'])
            ->group(function () {
                Route::get('/', "DashboardPegawaiController@index")->name('dashboard-pegawai');
                Route::get('cetak-slip/slip-gaji-{id}.PDF', "DashboardPegawaiController@cetak")->name('cetak-slip');
                Route::get('download-slip/slip-gaji-{id}.PDF', "DashboardPegawaiController@download")->name('download-slip');
                Route::get('test', "DashboardPegawaiController@cetak")->name('tes-cetak');
            });
    }
);
