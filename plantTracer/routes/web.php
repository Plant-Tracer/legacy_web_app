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

/*
Route::get('/{extension}', 'AuthController@index')->where('extension', '(?:index)?');
*/

Route::resource('/index','AuthController')->except(['create']);
Route::resource('/','IndexController');

Route::get('/database', 'DatabaseController@index');
Route::post('/database', 'DatabaseController@index');

//Return using plant tracer view
Route::get('/usingplanttracer{extension}', 'UsingPTController@index')->where('extension', '(?:.html)?');

//Return plant literacy view
Route::get('/plantliteracy{extension}','PlantLiteracyController@index')->where('extension', '(?:.html)?');

//Return forums views
Route::get('/forums','ForumsController@index');

//Return about view
Route::get('/about{extension}', 'AboutController@index')->where('extension', '(?:.html)?');

//Destroy user session, return homepage
Route::get('/logout', 'AuthController@destroy');

//Password reset for forgot password
Route::get('forgotpassword', 'Auth\ForgotPasswordController@getForgotView');
Route::post('forgotpassword', 'Auth\ForgotPasswordController@resetAuthenticated');

Route::get('/passwordreset','Auth\ForgotPasswordController@getResetView');
Route::post('/passwordreset','Auth\ForgotPasswordController@resetPassword');



