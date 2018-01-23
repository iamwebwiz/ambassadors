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

    // Publications
    Route::group(['prefix' => 'publications'], function() {
        Route::get('/', 'PublicationsController@index')->name('client.publications');
        Route::get('new', 'PublicationsController@showRequestPublicationForm')->name('client.newPublication');
        Route::post('new', 'PublicationsController@requestNewPublication')->name('requestNewPublication');
    });

    // Companies
    Route::group(['prefix' => 'companies'], function() {
        Route::get('/', 'CompaniesController@index')->name('client.companies');
        Route::get('new', 'CompaniesController@newCompany')->name('newCompany');
        Route::post('new', 'CompaniesController@addNewCompany')->name('addNewCompany');
    });
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
    Route::get('dashboard', 'HomeController@index')->name('admin.dash');

    Route::group(['prefix' => 'advert-requests'], function() {
        Route::get('/', 'AdvertRequestsController@index');
    });

    Route::group(['prefix' => 'users'], function() {
        Route::get('clients', 'HomeController@showAllClients');
        Route::post('clients', 'UsersController@addNewClient')->name('addNewClient');
        Route::get('publishers', 'HomeController@showAllPublishers');
        Route::post('publishers', 'UsersController@addNewPublisher')->name('addNewPublisher');
    });

    Route::get('companies', 'CompaniesController@index');
});
