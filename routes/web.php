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
Route::get('/event', 'EventController@frontIndex');
Route::get('/event/{id}', 'EventController@frontShow');

Auth::routes(['verify' => false, 'register' => false]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function()
{
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/events', 'EventController@index')->name('admin/events');
    Route::get('/events/{event}', 'EventController@show')->name('admin/event')->where('event', '[0-9]+');
    Route::get('/events/create', 'EventController@create')->name('admin/events/create');
    Route::post('/events/create', 'EventController@store')->name('admin/events/create');
    Route::get('/events/{event}/edit', 'EventController@edit')->name('admin/events/edit')->where('event', '[0-9]+');
    Route::post('/events/{event}/edit', 'EventController@update')->name('admin/events/edit')->where('event', '[0-9]+');
    Route::get('/events/{event}/destroy', 'EventController@destroy')->name('admin/events/destroy')->where('event', '[0-9]+');
    Route::post('/events/{event}/destroy', 'EventController@delete')->name('admin/events/destroy')->where('event', '[0-9]+');

    Route::get('/projects', 'ProjectController@index')->name('admin/projects');
    Route::get('/projects/{project}', 'ProjectController@show')->name('admin/project')->where('project', '[0-9]+');
    Route::get('/projects/create', 'ProjectController@create')->name('admin/projects/create');
    Route::post('/projects/create', 'ProjectController@store')->name('admin/projects/create');
    Route::get('/projects/{project}/edit', 'ProjectController@edit')->name('admin/projects/edit')->where('project', '[0-9]+');
    Route::post('/projects/{project}/edit', 'ProjectController@update')->name('admin/projects/edit')->where('project', '[0-9]+');
    Route::get('/projects/{project}/destroy', 'ProjectController@destroy')->name('admin/projects/destroy')->where('project', '[0-9]+');
    Route::post('/projects/{project}/destroy', 'ProjectController@delete')->name('admin/projects/destroy')->where('project', '[0-9]+');
});

