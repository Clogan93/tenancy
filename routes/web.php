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

Route::resource('/', 'WelcomeController');
Route::get('/signout', 'WelcomeController@signout');

Route::resource('admin', 'AdminController');
Route::resource('tenant', 'TenantController');

Route::get('login', 'LoginController@index');
Route::post('login', 'LoginController@signin');

Route::get('advanced', 'AdvancedController@index');

Route::get('/home', 'HomeController@index');
