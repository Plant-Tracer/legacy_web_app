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

Route::get('/index', 'IndexController@index')->name('home');

Route::get('/usingplanttracer', 'UsingPTController@index');

Route::get('/plantliteracy','PlantLiteracyController@index');

Route::get('/database','DatabaseController@index');

Route::get('/forums','ForumsController@index');

Route::get('/about', 'AboutController@index');

//Route::get('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');

Route::post('/database', 'RegistrationController@store');

//Route::post('/database', 'SessionsController@store');




