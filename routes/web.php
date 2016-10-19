<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();
Route::get('/', 'HomeController@index');

Route::get('om-oss', 'AboutController@index');

Route::get('kontakt', 'ContactController@create');
Route::post('kontakt', 'ContactController@store');

Route::get('arbetsgivare', 'FeaturedController@index');
Route::get('arbetsgivare/{id}', 'FeaturedController@featured');

Route::get('foretag', 'CompanyController@index');
Route::get('foretag/skapa', 'CompanyController@show');
Route::post('foretag/skapa', 'CompanyController@create');
Route::post('foretag/skapa/confirm', 'CompanyController@confirm');
Route::post('foretag/skapa/store', 'CompanyController@store');

Route::get('registrera', 'RegisterController@index');
////Route::get('search/{keyword?}', 'SearchController@index');
Route::get('hitta', 'SearchController@index');
//
Route::get('getJobInfo/{jobid}', 'JobController@getJob');
Route::get('jobb/{id}/{slug}', 'JobController@customJob');
Route::get('jobb/{id}', 'JobController@index');
Route::post('jobb/{id}/{slug?}/apply', 'JobController@apply');

// uncaught route
Route::get('{any}', function(){
    return(redirect(URL::action('HomeController@index')));
});