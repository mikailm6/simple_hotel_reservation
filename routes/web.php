<?php

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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'TransaksiController@index')->name('home');

Route::get('/admins', 'AdminController@index')->name('admins.index');
Route::post('/admins-store', 'AdminController@store')->name('admins.store');
Route::get('/admins-edit/{id}', 'AdminController@edit')->name('admins.edit');
Route::post('/admins-update/{id}', 'AdminController@update')->name('admins.update');
Route::delete('/admins-delete/{id}', 'AdminController@delete')->name('admins.destroy');

Route::resources([
    'customer' => CustomerController::class,
    'jruangan' => JRuanganController::class,
    'ruangan' => RuanganController::class,
    'transaksi' => TransaksiController::class,
]);
