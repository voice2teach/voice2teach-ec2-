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

Route::get('/', function () {
    // return view('welcome');
    return view('auth.login');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');

Route::get('/User/marks', 'HomeController@marks')->name('marks');
Route::get('/Tablemanagement/loadtable', 'TablemanagementController@loadtable')->name('loadtable');
Route::post('/Tablemanagement/createtable', 'TablemanagementController@createtable')->name('createtable');
Route::post('/Tablemanagement/new_table', 'TablemanagementController@new_table')->name('new_table');
Route::post('/Tablemanagement/savetable', 'TablemanagementController@savetable')->name('savetable');
Route::get('/Tablemanagement/deletetable', 'TablemanagementController@deletetable')->name('deletetable');
Route::post('/Tablemanagement/save_studentname', 'TablemanagementController@save_studentname')->name('save_studentname');
Route::get('/User/mytables', 'HomeController@mytables')->name('mytables');
Route::get('Tablemanagement/exportCSV', 'TablemanagementController@exportCSV')->name('exportCSV');
