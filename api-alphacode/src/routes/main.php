<?php

use App\Http\Route;

Route::get('/health-check', 'HealthCheckController@index');
Route::post('/contact/create',  'ContactController@create');
Route::get('/contact/list', 'ContactController@list');
Route::get('/contact/{id}/find', 'ContactController@findById');
Route::put('/contact/{id}/update', 'ContactController@update');
Route::delete('/contact/{id}/delete', 'ContactController@delete');
