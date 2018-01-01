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

// Routes for Client/Business Owner
Route::group(['prefix' => 'client', 'middleware' => ['auth', 'role:client'],
    'namespace' => 'Client'], function() {
    Route::get('/', 'HomeController@index')->name('client.dash');
});

// Routes for Publisher
Route::group(['prefix' => 'publisher', 'middleware' => ['auth', 'role:publisher'],
    'namespace' => 'Publisher'], function() {
    // Dashboard
    Route::get('/', 'HomeController@index')->name('publisher.dash');

    // Publications
    Route::group(['prefix' => 'publications'], function() {
        Route::get('/', 'PublicationsController@index')->name('publications');
        Route::get('new', 'PublicationsController@showNewPublicationForm');
        Route::post('new', 'PublicationsController@addNewPublication')->name('addNewPublication');
    });
});

// Routes for Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin'],
    'namespace' => 'Admin'], function() {
    Route::get('/', 'HomeController@index');
});
