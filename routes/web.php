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

Route::get('/', 'HomeController@index')->name('home');
Route::post('/AddLink', 'HomeController@addLink')->name('addlink');
Route::get('/EditLinks', 'HomeController@editLinks')->name('editlinks');
Route::post('UpdateLink', 'HomeController@updateLink')->name('updatelink');
Route::post('/DeleteLink', 'HomeController@deletelink')->name('deletelink');
Route::post('/AddReminder', 'HomeController@addReminder')->name('addreminder');
Route::post('/DeleteReminder', 'HomeController@deleteReminder')->name('deletereminder');
Route::get('/ReorderLinks', 'HomeController@reorderLinks')->name('reorderlinks');

Route::get('listips', 'HomeController@listips');

Route::resource('clients', 'ClientController');

Route::resource('autoreminders', 'AutoreminderController');

Route::resource('videos', 'VideoController');
Route::get('reordervideos','VideoController@reorder')->name('videos.reorder');

Route::get('/hydration', 'HydrationController@index')->name('hydration');
Route::post('/hydration', 'HydrationController@calculate')->name('hydration.calc');

