<?php

/*
|--------------------------------------------------------------------------
| Web Rouadmin-page
|--------------------------------------------------------------------------
|
| Here is where you can register web rouadmin-page for your application. These
| rouadmin-page are loaded by the Rouadmin-pageerviceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// use Illuminate\Routing\Route;


Route::get('/', function () {
    return view('content.welcome');
});

// auth
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('redirect/{driver}', 'Auth\LoginController@redirectToProvider')->name('login.provider');
Route::get('{driver}/callback', 'Auth\LoginController@handleProviderCallback')->name('login.callback');

// jabatan
Route::get('/jabatan', 'PositionController@index');
Route::post('/jabatan/store', 'PositionController@store');
Route::delete('/jabatan/{position}', 'PositionController@destroy');
Route::patch('/jabatan/{position}', 'PositionController@update');

// karyawan 
Route::get('/karyawan', 'EmployeeController@index');
Route::post('/karyawan/store', 'EmployeeController@store');
Route::delete('/karyawan/{employee}', 'EmployeeController@destroy');
Route::patch('/karyawan/{employee}', 'EmployeeController@update');

// pendidikan
Route::get('/pendidikan', 'EducationController@index');
Route::post('/pendidikan/store', 'EducationController@store');
Route::delete('/pendidikan/{pendidikan}', 'EducationController@destroy');
Route::patch('/pendidikan/{pendidikan}', 'EducationController@update');

// status
Route::get('/status', 'StatusController@index');
Route::post('/status/store', 'StatusController@store');
Route::delete('/status/{status}', 'StatusController@destroy');
Route::patch('/status/{status}', 'StatusController@update');

// riwayat pendidikan
Route::get('/riwayatPendidikan', 'EducationalBackgroundController@index');
Route::post('/riwayatPendidikan/store', 'EducationalBackgroundController@store');
Route::delete('/riwayatPendidikan/{EducationalBackground}', 'EducationalBackgroundController@destroy');
Route::patch('/riwayatPendidikan/{EducationalBackground}', 'EducationalBackgroundController@update');
