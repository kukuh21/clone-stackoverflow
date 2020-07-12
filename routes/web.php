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

Route::get('/', 'PertanyaanController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('pertanyaan', 'PertanyaanController');

Route::get('jawaban/create/{pertanyaan_id}', 'JawabanController@create');// menuju form pengisian jawaban
Route::post('/jawaban/{petanyaan_id}', 'JawabanController@store');// menyimpan jawaban, redirect ke list pertanyaan
Route::get('/jawaban/{jawaban_id}/edit', 'JawabanController@edit');// menyimpan jawaban, redirect ke list pertanyaan
Route::put('/jawaban/{pertanyaan_id}', 'JawabanController@update');
Route::delete('/jawaban/{jawaban_id}', 'JawabanController@destroy');
Route::get('/jawaban/{jawaban_id}/verify', 'JawabanController@verify');

Route::post('/komentar/{pertanyaan_id}', 'KomentarController@store');
Route::post('/komentar/jawaban/{jawaban_id}', 'KomentarController@storeJawabanComment');

Route::get('tag/{tag_id}', 'TagController@show');
Route::get('tag', 'TagController@index');
