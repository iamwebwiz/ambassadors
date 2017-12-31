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

Route::get('/', 'FrontendController@welcome')->name('welcome');

Auth::routes();

Route::get('logout', 'HomeController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'client', 'middleware' => ['auth', 'role:client'],
    'namespace' => 'Client'], function() {
    Route::get('/', 'HomeController@index')->name('client.dash');
});

Route::group(['prefix' => 'publisher', 'middleware' => ['auth', 'role:publisher'],
    'namespace' => 'Publisher'], function() {
    Route::get('/', 'HomeController@index')->name('publisher.dash');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin'],
    'namespace' => 'Admin'], function() {
    Route::get('/', 'HomeController@index');
});
