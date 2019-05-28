<?php

// backend login
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function(){
    Auth::routes(['verify' => false, 'register' => false]);
});

// backend admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function()
{
    // Backend homepage
    Route::get('/', 'Backend\\AdminController@index')->name('admin');

    // Backend projects
    Route::get('/projects', 'Backend\\ProjectController@index')->name('admin/projects');
    Route::get('/projects/{project}', 'Backend\\ProjectController@show')->name('admin/project')->where('project', '[0-9]+');
    Route::get('/projects/create', 'Backend\\ProjectController@create')->name('admin/projects/create');
    Route::post('/projects/create', 'Backend\\ProjectController@store')->name('admin/projects/create');
    Route::get('/projects/{project}/edit', 'Backend\\ProjectController@edit')->name('admin/projects/edit')->where('project', '[0-9]+');
    Route::post('/projects/{project}/edit', 'Backend\\ProjectController@update')->name('admin/projects/edit')->where('project', '[0-9]+');
    Route::get('/projects/{project}/destroy', 'Backend\\ProjectController@destroy')->name('admin/projects/destroy')->where('project', '[0-9]+');
    Route::post('/projects/{project}/destroy', 'Backend\\ProjectController@delete')->name('admin/projects/destroy')->where('project', '[0-9]+');
    Route::get('/projects/{project}/image/{picture}', 'Backend\\ProjectController@destroyImage')->name('admin/projects/image')->where('project', '[0-9]+')->where('picture', '[0-9]+');
    Route::post('/projects/{project}/image/{picture}', 'Backend\\ProjectController@deleteImage')->name('admin/projects/image')->where('project', '[0-9]+')->where('picture', '[0-9]+');

    // Backend volunteers
    Route::get('/volunteers', 'Backend\\VolunteerController@index')->name('admin/volunteers');
    Route::get('/volunteers/{volunteer}', 'Backend\\VolunteerController@show')->name('admin/volunteer')->where('volunteer', '[0-9]+');
//    Route::get('/volunteers/create', 'Backend\\VolunteerController@create')->name('admin/volunteers/create');
//    Route::post('/volunteers/create', 'Backend\\VolunteerController@store')->name('admin/volunteers/create');
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

    // Backend events
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
    Route::get('/events/{event}/partners', 'Backend\\EventController@showPartners')->name('admin/events/partners')->where('event', '[0-9]+');
    Route::post('/events/{event}/partners', 'Backend\\EventController@storePartners')->name('admin/events/partners')->where('event', '[0-9]+');

    // Backend team members
    Route::resource('/team_member', 'Backend\\TeamMemberController');

    // Backend contact forms
    Route::resource('/contact_form', 'Backend\\ContactFormController')->only([
        'index', 'show', 'destroy'
    ]);

    // Backend partners
    Route::get('/partners', 'Backend\\PartnerController@index')->name('admin/partners');
    Route::get('/partners/{partner}', 'Backend\\PartnerController@show')->name('admin/partner')->where('partner', '[0-9]+');
    Route::get('/partners/create', 'Backend\\PartnerController@create')->name('admin/partners/create');
    Route::post('/partners/create', 'Backend\\PartnerController@store')->name('admin/partners/create');
    Route::get('/partners/{partner}/edit', 'Backend\\PartnerController@edit')->name('admin/partners/edit')->where('partner', '[0-9]+');
    Route::post('/partners/{partner}/edit', 'Backend\\PartnerController@update')->name('admin/partners/edit')->where('partner', '[0-9]+');
    Route::get('/partners/{partner}/destroy', 'Backend\\PartnerController@destroy')->name('admin/partners/destroy')->where('partner', '[0-9]+');
    Route::post('/partners/{partner}/destroy', 'Backend\\PartnerController@delete')->name('admin/partners/destroy')->where('partner', '[0-9]+');
    Route::get('/partners/featured', 'Backend\\PartnerController@showFeatured')->name('admin/partners/featured');
    Route::post('/partners/featured', 'Backend\\PartnerController@storeFeatured')->name('admin/partners/featured');

    // Backend edit content
    Route::get('/edit_content', 'Backend\\EditContentController@index');
    Route::put('/edit_content', 'Backend\\EditContentController@update');
    Route::post('/edit_content/homepage_order', 'Backend\\EditContentController@homepageOrder');

    // Facebook
    Route::get('/facebook', "Backend\\FacebookController@index")->name('admin/facebook');
    Route::get('/fb/callback', "Backend\\FacebookController@callback")->name('admin/facebook/callback');
    Route::get('/facebook/update', "Backend\\FacebookController@update")->name('admin/facebook/update');

    // Instagram
    Route::get('/instagram', "Backend\\InstagramController@index")->name('admin/instagram');
    Route::get('/instagram/callback', "Backend\\InstagramController@callback")->name('admin/instagram/callback');
    Route::get('/instagram/update', "Backend\\InstagramController@update")->name('admin/instagram/update');

    // Donations
    Route::get('/donations', 'Backend\\DonationController@index');
    Route::get('/donations/{donation}', 'Backend\\DonationController@show');
    Route::get('/donations/{donation}/refund', 'Backend\\DonationController@refund');
    Route::post('/donations/{donation}/refund', 'Backend\\DonationController@refund');

    // VEADS requests
    Route::resource('/veads_request', 'Backend\\VeadsRequestController');
    Route::get('/veads_response/{veadsResponse}', 'Backend\\VeadsRequestController@response');

    // Ambassadors
    Route::resource('/ambassador', 'Backend\\AmbassadorController');
});
