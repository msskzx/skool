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

// Route::group(['middleware' => ['web']], function () {

/*
|--------------------------------------------------------------------------
| user routes
|--------------------------------------------------------------------------
|
*/
Route::auth();
Route::resource('/user', 'UserController');

/*
|--------------------------------------------------------------------------
| static pages routes
|--------------------------------------------------------------------------
|
*/
Route::get('/', 'HomeController@index');

/*
|--------------------------------------------------------------------------
| school routes
|--------------------------------------------------------------------------
|
*/
Route::resource('/school', 'SchoolController');

/*
|--------------------------------------------------------------------------
| elementary level routes
|--------------------------------------------------------------------------
|
*/
Route::resource('/elementarylevel', 'ElementaryLevelController');

/*
|--------------------------------------------------------------------------
| middle level routes
|--------------------------------------------------------------------------
|
*/
Route::resource('/middlelevel', 'MiddleLevelController');

/*
|--------------------------------------------------------------------------
| elementary level routes
|--------------------------------------------------------------------------
|
*/
Route::resource('/highlevel', 'HighLevelController');

/*
|--------------------------------------------------------------------------
| club routes
|--------------------------------------------------------------------------
|
*/
Route::resource('/club', 'ClubController');
Route::post('/club/{club}/join', 'ClubController@join');

/*
|--------------------------------------------------------------------------
| parent routes
|--------------------------------------------------------------------------
|
*/
Route::resource('/parent', 'ParentController');

/*
|--------------------------------------------------------------------------
| student routes
|--------------------------------------------------------------------------
|
*/
Route::resource('/student', 'StudentController');

/*
|--------------------------------------------------------------------------
| employee routes
|--------------------------------------------------------------------------
|
*/
Route::resource('/employee', 'EmployeeController');

/*
|--------------------------------------------------------------------------
| teacher routes
|--------------------------------------------------------------------------
|
*/
Route::resource('/teacher', 'TeacherController');


/*
|--------------------------------------------------------------------------
| admin routes
|--------------------------------------------------------------------------
|
*/
Route::resource('/admin', 'AdminController');

/*
|--------------------------------------------------------------------------
| course routes
|--------------------------------------------------------------------------
|
*/
Route::resource('/course', 'CourseController');

// });
