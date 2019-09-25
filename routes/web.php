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

Route::get('/', 'NoteController@index')->name('notes');
Route::get('/notes/create', 'NoteController@create')->name('notes.create');
Route::post('/notes', 'NoteController@store')->name('notes.store');