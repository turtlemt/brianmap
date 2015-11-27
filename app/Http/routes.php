<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Front
Route::get('map/findall', 'MapController@findall');
Route::any('map/createsite', 'MapController@createSite');
Route::any('map/editsite/{id}', 'MapController@editSite');
Route::any('map/site/{id}', 'MapController@site');
Route::resource('map', 'MapController');



//Back
Route::group(['prefix' => 'mapback', 'middleware' => 'auth.basic'], function () {
    
    // Matches The "/mapback/map" URL
    Route::resource('map', 'MapController');
});


//Api
/*Route::group(['prefix' => 'api', 'middleware' => 'ApiAuth'], function () {
    
    // Matches The "/api/map" URL
    Route::get('map/findall', 'MapController@findall');
    Route::resource('map', 'MapController');
    
});*/