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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {

    return view('auth.login');

})->name('login');

Route::get('/', function() {

    return redirect('/login');

});

Route::group(['middleware' => ['auth' => 'CekRole:admin']], function() {

    Route::get('/dashboard', 'AdminController@index')->name('dashboard');
    Route::get('/hapus/{id}', 'AdminController@hapus');
    Route::get('/tambah', 'AdminController@viewTambah');
    Route::post('/proses_tambah', 'AdminController@prosesTambah');
    Route::get('/edit/{id}', 'AdminController@edit');
    Route::put('/proses_edit/{id}', 'AdminController@prosesEdit');
    Route::get('/voteSelesai', 'AdminController@voteSelesai');
    Route::get('/registerSiswa', 'AdminController@registerSiswa');
    Route::post('/prosesRegisterSiswa', 'AdminController@prosesRegisterSiswa');
    Route::get('/detailPaslon/{id}', 'AdminController@detail');
    Route::get('/user/importSiswa', 'AdminController@importSiswa');
    Route::post('/user/import_excel', 'AdminController@importExcel');

});

Route::group(['middleware' => ['auth' => 'CekRole:admin,siswa']], function() {

    Route::get('/hasilVote', 'AdminController@hasilVote');

});

Auth::routes();

Route::group(['middleware' => ['auth' => 'CekRole:siswa']], function() {

    Route::get('/home', 'siswaController@index')->name('home');
    Route::get('/detail/{id}', 'siswaController@detail');
    Route::get('/pilihPaslon/{id}', 'siswaController@pilihPaslon');

}); 
