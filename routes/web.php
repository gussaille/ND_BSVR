<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

// Route::get('/administration', 'Auth\LoginController@index');
// Route::get('/administration/dashboard', 'Auth\LoginController@toDashboard');

Route::get('/administration/survey', 'HomeController@questions')->name('show_questions');
Route::get('/administration/dashboard', 'HomeController@charts')->name('show_charts');
Route::get('/administration/answers', 'HomeController@answers')->name('show_answers');



// Route::post('post-login', 'Auth\LoginController@postLogin'); 
// // Route::get('/administration/dashboard', 'Auth\LoginController@dashboard'); 
// Route::get('logout', 'Auth\LoginController@logout');

Route::get('/', 'FrontController@index');
Route::post('/submit', 'FrontController@store');


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
