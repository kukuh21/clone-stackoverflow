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
Route::post('jawaban', 'JawabanController@store');// menyimpan jawaban, redirect ke list pertanyaan

