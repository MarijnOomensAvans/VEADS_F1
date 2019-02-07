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
    return view('welcome');
});

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin/events', 'EventController@index')->name('admin/events');
Route::get('/admin/events/{event}', 'EventController@show')->name('admin/event')->where('event', '[0-9]+');
Route::get('/admin/events/create', 'EventController@create')->name('admin/events/create');
Route::post('/admin/events/create', 'EventController@store')->name('admin/events/create');
Route::get('/admin/events/{event}/edit', 'EventController@edit')->name('admin/events/edit')->where('event', '[0-9]+');
Route::get('/admin/events/{event}/destroy', 'EventController@destroy')->name('admin/events/destroy')->where('event', '[0-9]+');
Route::post('/admin/events/{event}/destroy', 'EventController@destroy')->name('admin/events/destroy')->where('event', '[0-9]+');