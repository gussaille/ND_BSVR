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

Route::prefix('administration')->middleware(['auth'])->group(function(){
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('/survey', 'AdminController@questions')->name('admin.questions');
    Route::get('/answers', 'AdminController@answers')->name('admin.answers');
});


// Route::post('post-login', 'Auth\LoginController@postLogin'); 
// // Route::get('/administration/dashboard', 'Auth\LoginController@dashboard'); 
// Route::get('logout', 'Auth\LoginController@logout');

Route::post('/user/email', 'SurveyController@checkEmail');

Route::get('/', 'FrontController@index');
Route::post('/submit', 'FrontController@store');


// Auth::routes();

// Route::get('/Admin', 'AdminController@index')->name('Admin');
