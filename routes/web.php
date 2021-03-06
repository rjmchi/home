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



Route::post('/AddLink', 'HomeController@addLink')->name('addlink');
Route::get('/EditLinks', 'HomeController@editLinks')->name('editlinks');
Route::post('UpdateLink', 'HomeController@updateLink')->name('updatelink');
Route::post('/DeleteLink', 'HomeController@deletelink')->name('deletelink');

Route::post('/AddReminder', 'HomeController@addReminder')->name('addreminder');
Route::post('/DeleteReminder/{reminder}', 'HomeController@deleteReminder')->name('deletereminder');

Route::get('/ReorderLinks', 'HomeController@reorderLinks')->name('reorderlinks');

Route::get('listips', 'HomeController@listips');

Route::resource('clients', 'ClientController');

Route::resource('autoreminders', 'AutoreminderController');

Route::resource('videos', 'VideoController');
Route::get('reordervideos','VideoController@reorder')->name('videos.reorder');

Route::get('/schedule', 'ScheduleController@index')->name('schedule.index');
Route::post('schedule', 'ScheduleController@store')->name('schedule.store');
Route::get('/schedule/create','ScheduleController@create')->name('schedule.create');
Route::patch('/schedule/{reminder}','ScheduleController@update')->name('schedule.update');
Route::delete('/schedule/{reminder}','ScheduleController@destroy')->name('schedule.destroy');
Route::get('/schedule/{reminder}/edit','ScheduleController@edit')->name('schedule.edit');


Route::get('/hydration', function() {
	return view('hydration');
});

Route::get('/notes', function() {
	return view('notes');
});

Route::get('/howard', function() {
	return view('howard');
});

Route::get('/{sort?}', 'HomeController@index')->name('home');