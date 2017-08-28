<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


// Get the total number of jobs currently listed on the site
Route::get('/numJobs', 'HomeController@getTotalNumberOfJobs');

// Get all job ads
Route::get('/fetchJobs', 'SearchController@getJobs');
Route::post('/fetchJobs', 'SearchController@getJobs');