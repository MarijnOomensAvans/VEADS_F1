<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'WizardController@index');
Route::get('/finish', 'WizardController@finish');
Route::get('/{step}', 'WizardController@showStep');
Route::post('/app', 'WizardController@processApp');
Route::post('/database', 'WizardController@processDatabase');
Route::post('/facebook', 'WizardController@processFacebook');
Route::post('/instagram', 'WizardController@processInstagram');
Route::post('/mail', 'WizardController@processMail');
Route::post('/mollie', 'WizardController@processMollie');
Route::post('/analytics', 'WizardController@processAnalytics');
Route::post('/done', 'WizardController@processDone');