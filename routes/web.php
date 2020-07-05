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
    return view('home');
});

Route::get('/artikel', 'ArticlesController@index'); // menampilkan semua
Route::get('/artikel/create', 'ArticlesController@create'); // menampilkan halaman form
Route::post('/artikel', 'ArticlesController@store'); // menyimpan data
Route::get('/artikel/{id}', 'ArticlesController@show'); // menampilkan detail item dengan id 
Route::get('/artikel/{id}/edit', 'ArticlesController@edit'); // menampilkan form untuk edit item
Route::put('/artikel/{id}', 'ArticlesController@update'); // menyimpan perubahan dari form edit
Route::delete('/artikel/{id}', 'ArticlesController@destroy'); // menghapus data dengan id