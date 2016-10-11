<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', [
    'as'   => 'tickets.latest',
    'uses' => 'TicketsController@latest'
]);
Route::get('/populares', [
    'as'   => 'tickets.popular',
    'uses' => 'TicketsController@latest'
]);
Route::get('/pendientes', [
    'as'   => 'tickets.open',
    'uses' => 'TicketsController@latest'
]);
Route::get('/tutoriales', [
    'as'   => 'tickets.closed',
    'uses' => 'TicketsController@latest'
]);
Route::get('/solicitud/{id}', [
    'as'   => 'tickets.details',
    'uses' => 'TicketsController@latest'
]);
Auth::routes();
Route::get('/', 'TicketsController@latest');