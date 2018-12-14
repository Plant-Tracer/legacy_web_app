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

Route::resource('/index','AuthController')->except(['create']);

Route::get('/database', 'DatabaseController@index');

//Return using plant tracer view
Route::get('/usingplanttracer', 'UsingPTController@index');

//Return plant literacy view
Route::get('/plantliteracy','PlantLiteracyController@index');

//Return forums views
Route::get('/forums','ForumsController@index');

//Return about view
Route::get('/about', 'AboutController@index');

//Destroy user session, return homepage
Route::get('/logout', 'AuthController@destroy');

//Password reset for forgot password
Route::get('forgotpassword', 'Auth\ForgotPasswordController@getForgotView');
Route::post('forgotpassword', 'Auth\ForgotPasswordController@resetAuthenticated');

Route::get('/passwordreset','Auth\ForgotPasswordController@getResetView');





