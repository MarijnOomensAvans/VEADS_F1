<?php
                                                           
Route::get('/', 'Frontend\\HomeController@index')->name('home');
Route::get('/event', 'Frontend\\EventController@frontIndex');
Route::get('/event/{id}', 'Frontend\\EventController@frontShow');
Route::get('/project', 'Frontend\\ProjectController@frontIndex');
Route::get('/project/{id}', 'Frontend\\ProjectController@frontShow');
Route::get('/image/{hashname}/{filename}', 'Frontend\\ImageController@show')->where('hashname', '[a-zA-Z0-9.]+');
Route::get('/contact', 'Frontend\\ContactController@index');
Route::post('/contact', 'Frontend\\ContactController@store');

// win-win
Route::get('/ikhelpmee', 'Frontend\\WinWinController@index');
Route::view('/thanks', 'front.win-win.thanks');
Route::get('/inschrijvenvrijwilliger', 'Frontend\\WinWinController@enrollVolunteer');
Route::post('/inschrijvenvrijwilliger', 'Frontend\\WinWinController@saveEnrollVolunteer');

// dont know
Route::post('/event/{event}/add-visitor', 'Backend\\VisitorController@store')->name('event/add-visitor')->where('event', '[0-9]+');

// frontend login
Route::get('/login', 'Frontend\\AuthController@login');
Route::post('/login', 'Frontend\\AuthController@loginPost');
Route::get('/logout', 'Frontend\\AuthController@logout');

?>