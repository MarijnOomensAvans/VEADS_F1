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

Route::get('/', 'Frontend\\HomeController@index')->name('home');
Route::get('/event', 'Frontend\\EventController@frontIndex');
Route::get('/event/{id}', 'Frontend\\EventController@frontShow');
Route::get('/project', 'Frontend\\ProjectController@frontIndex');
Route::get('/project/{id}', 'Frontend\\ProjectController@frontShow');
Route::get('/image/{hashname}/{filename}', 'Frontend\\ImageController@show')->where('hashname', '[a-zA-Z0-9.]+');
Route::get('/contact', 'Frontend\\ContactController@index');
Route::post('/contact', 'Frontend\\ContactController@store');

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

    Route::get('/volunteers', 'Backend\\VolunteerController@index')->name('admin/volunteers');
    Route::get('/volunteers/{volunteer}', 'Backend\\VolunteerController@show')->name('admin/volunteer')->where('volunteer', '[0-9]+');
    Route::get('/volunteers/create', 'Backend\\VolunteerController@create')->name('admin/volunteers/create');
    Route::post('/volunteers/create', 'Backend\\VolunteerController@store')->name('admin/volunteers/create');
    Route::get('/volunteers/{volunteer}/edit', 'Backend\\VolunteerController@edit')->name('admin/volunteers/edit')->where('volunteer', '[0-9]+');
    Route::post('/volunteers/{volunteer}/edit', 'Backend\\VolunteerController@update')->name('admin/volunteers/edit')->where('volunteer', '[0-9]+');
    Route::get('/volunteers/{volunteer}/destroy', 'Backend\\VolunteerController@destroy')->name('admin/volunteers/destroy')->where('volunteer', '[0-9]+');
    Route::post('/volunteers/{volunteer}/destroy', 'Backend\\VolunteerController@delete')->name('admin/volunteers/destroy')->where('volunteer', '[0-9]+');
    Route::get('/volunteers/{volunteer}/project/0/add', 'Backend\\VolunteerController@addEmptyProject')->where('volunteer', '[0-9]+');
    Route::get('/volunteers/{volunteer}/project/{project}/add', 'Backend\\VolunteerController@addProject')->where('volunteer', '[0-9]+')->where('project', '[0-9]+');
    Route::get('/volunteers/{volunteer}/project/{project}/remove', 'Backend\\VolunteerController@removeProject')->where('volunteer', '[0-9]+')->where('project', '[0-9]+');
    Route::get('/volunteers/{volunteer}/event/0/add', 'Backend\\VolunteerController@addEmptyEvent')->where('volunteer', '[0-9]+');
    Route::get('/volunteers/{volunteer}/event/{event}/add', 'Backend\\VolunteerController@addEvent')->where('volunteer', '[0-9]+')->where('event', '[0-9]+');
    Route::get('/volunteers/{volunteer}/event/{event}/remove', 'Backend\\VolunteerController@removeEvent')->where('volunteer', '[0-9]+')->where('event', '[0-9]+');

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
    Route::get('/events/featured', 'Backend\\EventController@showFeatured')->name('admin/events/featured');
    Route::post('/events/featured', 'Backend\\EventController@storeFeatured')->name('admin/events/featured');

    Route::get('/instagram', 'Backend\\InstagramController@askAuthorization')->name('admin/instagram');
    Route::get('/instagram/callback', 'Backend\\InstagramController@callback')->name('admin/instagram/callback');

    Route::resource('/team_member', 'Backend\\TeamMemberController');

    Route::resource('/contact_form', 'Backend\\ContactFormController')->only([
        'index', 'show', 'destroy'
    ]);
});
Route::post('/event/{event}/add-visitor', 'Backend\\VisitorController@store')->name('event/add-visitor')->where('event', '[0-9]+');

