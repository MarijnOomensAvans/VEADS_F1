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

Route::view('/', 'front.home')->name('home');
Route::get('/event', 'Frontend\\EventController@frontIndex');
Route::get('/event/{id}', 'Frontend\\EventController@frontShow');

Auth::routes(['verify' => false, 'register' => false]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function()
{
    Route::get('/', 'Backend\\AdminController@index')->name('admin');
    Route::get('/events', 'Backend\\EventController@index')->name('admin/events');
    Route::get('/events/{event}', 'Backend\\EventController@show')->name('admin/event')->where('event', '[0-9]+');
    Route::get('/events/create', 'Backend\\EventController@create')->name('admin/events/create');
    Route::post('/events/create', 'Backend\\EventController@store')->name('admin/events/create');
    Route::get('/events/{event}/edit', 'Backend\\EventController@edit')->name('admin/events/edit')->where('event', '[0-9]+');
    Route::post('/events/{event}/edit', 'Backend\\EventController@update')->name('admin/events/edit')->where('event', '[0-9]+');
    Route::get('/events/{event}/destroy', 'Backend\\EventController@destroy')->name('admin/events/destroy')->where('event', '[0-9]+');
    Route::post('/events/{event}/destroy', 'Backend\\EventController@delete')->name('admin/events/destroy')->where('event', '[0-9]+');
});

