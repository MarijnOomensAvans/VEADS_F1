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
Route::get('/project', 'Frontend\\ProjectController@frontIndex');
Route::get('/project/{id}', 'Frontend\\ProjectController@frontShow');
Route::get('/image/{hashname}/{filename}', 'Frontend\\ImageController@show')->where('hashname', '[a-zA-Z0-9.]+');

Auth::routes(['verify' => false, 'register' => false]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function()
{
    Route::get('/projects', 'Backend\\ProjectController@index')->name('admin/projects');
    Route::get('/projects/{project}', 'Backend\\ProjectController@show')->name('admin/project')->where('project', '[0-9]+');
    Route::get('/projects/create', 'Backend\\ProjectController@create')->name('admin/projects/create');
    Route::post('/projects/create', 'Backend\\ProjectController@store')->name('admin/projects/create');
    Route::get('/projects/{project}/edit', 'Backend\\ProjectController@edit')->name('admin/projects/edit')->where('project', '[0-9]+');
    Route::post('/projects/{project}/edit', 'Backend\\ProjectController@update')->name('admin/projects/edit')->where('project', '[0-9]+');
    Route::get('/projects/{project}/destroy', 'Backend\\ProjectController@destroy')->name('admin/projects/destroy')->where('project', '[0-9]+');
    Route::post('/projects/{project}/destroy', 'Backend\\ProjectController@delete')->name('admin/projects/destroy')->where('project', '[0-9]+');

    Route::get('/', 'Backend\\AdminController@index')->name('admin');
    Route::get('/events', 'Backend\\EventController@index')->name('admin/events');
    Route::get('/events/{event}', 'Backend\\EventController@show')->name('admin/event')->where('event', '[0-9]+');
    Route::get('/events/create', 'Backend\\EventController@create')->name('admin/events/create');
    Route::post('/events/create', 'Backend\\EventController@store')->name('admin/events/create');
    Route::get('/events/{event}/edit', 'Backend\\EventController@edit')->name('admin/events/edit')->where('event', '[0-9]+');
    Route::post('/events/{event}/edit', 'Backend\\EventController@update')->name('admin/events/edit')->where('event', '[0-9]+');
    Route::get('/events/{event}/destroy', 'Backend\\EventController@destroy')->name('admin/events/destroy')->where('event', '[0-9]+');
    Route::post('/events/{event}/destroy', 'Backend\\EventController@delete')->name('admin/events/destroy')->where('event', '[0-9]+');
    Route::get('/events/{event}/image/{picture}', 'Backend\\EventController@destroyImage')->name('admin/events/image')->where('event', '[0-9]+')->where('picture', '[0-9]+');
    Route::post('/events/{event}/image/{picture}', 'Backend\\EventController@deleteImage')->name('admin/events/image')->where('event', '[0-9]+')->where('picture', '[0-9]+');
});

