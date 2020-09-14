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
    Route::get('/survey', 'AdminController@showQuestions')->name('admin.questions');
    Route::get('/answers', 'AdminController@showAnswers')->name('admin.answers');
});

Route::get('/questionnaire/{id}', 'SurveyController@index')->name('surveys.index');
Route::get('/questions', 'SurveyController@getQuestions');
Route::post('/user/email', 'SurveyController@checkEmail');
Route::post('/answers', 'SurveyController@storeAnswers')->name('store.answers');
