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

Route::group(['middleware' => ['web']], function () {

/*
|--------------------------------------------------------------------------
| auth
|--------------------------------------------------------------------------
|
*/
Route::auth();


/*
|--------------------------------------------------------------------------
| homepage
|--------------------------------------------------------------------------
|
*/
Route::get('/', 'HomeController@index');


/*
|--------------------------------------------------------------------------
| school
|--------------------------------------------------------------------------
|
*/
Route::get('/school', 'SchoolController@index');


/*
|--------------------------------------------------------------------------
| levels
|--------------------------------------------------------------------------
|
*/
Route::get('elementarylevel', 'ElementaryLevelController@index');
Route::get('middlelevel', 'MiddleLevelController@index');
Route::get('highlevel', 'HighLevelController@index');

/*
|--------------------------------------------------------------------------
| clubs
|--------------------------------------------------------------------------
|
*/
Route::get('/club', 'ClubController@index');

});
