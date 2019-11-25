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

Route::get('/', function () {
    // return redirect('/login');
    return redirect('/questions');
});

Route::resource('/comments', 'CommentController');

Route::resource('/questions', 'QuestionController');

Route::resource('/infos', 'InfoController');
Route::patch('/infos/update', 'InfoController@update');
Route::delete('/infos/delete', 'InfoController@destroy');
Route::post('/infos/create', 'InfoController@create');

Route::resource('/places', 'PlaceController');
Route::patch('/places/update', 'PlaceController@update');
Route::delete('/places/delete', 'PlaceController@destroy');
Route::post('/places/create', 'PlaceController@create');

Route::resource('/timatables', 'TimetableController');
Route::patch('/timatables/update', 'TimetableController@update');
Route::delete('/timatables/delete', 'TimetableController@destroy');
Route::post('/timatables/create', 'TimetableController@create');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');