<?php

use Illuminate\Support\Facades\Route;

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

// Profile
Route::get('/profile', 'Frontend\\AuthController@profile');
Route::post('/profile', 'Frontend\\AuthController@saveProfile');

// Reset password
Route::get('/reset_password', 'Frontend\\ResetPasswordController@showLinkRequestForm');

// Donations
Route::get('/doneren', 'Frontend\\DonationController@index');
Route::post('/doneren', 'Frontend\\DonationController@preparePayment');
Route::get('/doneren/{donation}', 'Frontend\\DonationController@redirect');
Route::post('/mollie/webhook', 'Frontend\\DonationController@webhook');

// VEADS requests
Route::get('/veads-zoekt', 'Frontend\\VeadsRequestController@index');
Route::get('/veads-zoekt/bedankt', 'Frontend\\VeadsRequestController@thanks');
Route::get('/veads-zoekt/{request}', 'Frontend\\VeadsRequestController@show');
Route::post('/veads-zoekt/{vrequest}', 'Frontend\\VeadsRequestController@store');
