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

// auth middleware
Route::group(['prefix' => 'system', 'middleware' => 'auth'], function () {
    //users
    Route::get('users', 'UsersController@index')->name('users.index')->middleware('permission:users index');
    Route::get('users/show/{id}', 'UsersController@show')->name('users.show')->middleware('permission:users show');
    Route::get('users/edit/{id}', 'UsersController@edit')->name('users.edit')->middleware('permission:users edit');
    Route::post('users/update/{id}', 'UsersController@update')->name('users.update');
    Route::get('users/destroy/{id}', 'UsersController@destroy')->name('users.destroy')->middleware('permission:users delete');

    //solicitations
    Route::get('solicitations', 'SolicitationsController@index')->name('solicitations.index')->middleware('permission:solicitations index');
    Route::get('solicitations/show/{id}', 'SolicitationsController@show')->name('solicitations.show')->middleware('permission:solicitations show');
    Route::get('solicitations/edit/{id}', 'SolicitationsController@edit')->name('solicitations.edit')->middleware('permission:solicitations edit');
    Route::post('solicitations/update/{id}', 'SolicitationsController@update')->name('solicitations.update');
    Route::get('solicitations/destroy/{id}', 'SolicitationsController@destroy')->name('solicitations.destroy')->middleware('permission:solicitations delete');
    Route::get('solicitations/historial/{id}', 'SolicitationsController@historial')->name('solicitations.historial');
});
