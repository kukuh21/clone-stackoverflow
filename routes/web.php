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
Route::get('/jawaban/{petanyaan_id}/edit', 'JawabanController@edit');// menyimpan jawaban, redirect ke list pertanyaan
Route::put('/jawaban/{petanyaan_id}', 'JawabanController@update');
Route::delete('/jawaban/{petanyaan_id}', 'JawabanController@destroy');

Route::get('tag/{tag_id}', 'TagController@show');
Route::get('tag', 'TagController@index');
