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
| static pages routes
|--------------------------------------------------------------------------
*/
Route::get('/', 'HomeController@home');

/*
|--------------------------------------------------------------------------
| user routes
|--------------------------------------------------------------------------
*/
Route::get('/login', 'Auth\AuthController@showLoginForm');
Route::post('/login', 'Auth\AuthController@login');
Route::get('/logout', 'Auth\AuthController@logout');
Route::resource('/user', 'UserController');

/*
|--------------------------------------------------------------------------
| school routes
|--------------------------------------------------------------------------
*/
Route::get('school/search', 'SchoolController@search');
Route::get('school/{school}/reviews', 'SchoolController@reviewIndex');
Route::get('school/{school}/activities', 'ActivityController@getSchoolActivities');
Route::resource('/school', 'SchoolController');
Route::get('/school/{school}/clubs', 'ClubController@getSchoolClubs');
Route::get('/levels', 'SchoolController@levels');

/*
|--------------------------------------------------------------------------
| elementary level routes
|--------------------------------------------------------------------------
*/
Route::resource('/elementarylevel', 'ElementaryLevelController');

/*
|--------------------------------------------------------------------------
| middle level routes
|--------------------------------------------------------------------------
*/
Route::resource('/middlelevel', 'MiddleLevelController');

/*
|--------------------------------------------------------------------------
| elementary level routes
|--------------------------------------------------------------------------
*/
Route::resource('/highlevel', 'HighLevelController');

/*
|--------------------------------------------------------------------------
| club routes
|--------------------------------------------------------------------------
*/
Route::get('club/{club}/members', 'ClubController@members');
Route::get('/club/{club}/join', 'ClubController@join');
Route::resource('/club', 'ClubController');

/*
|--------------------------------------------------------------------------
| parent routes
|--------------------------------------------------------------------------
*/
Route::resource('/parent', 'ParentController');

/*
|--------------------------------------------------------------------------
| student routes
|--------------------------------------------------------------------------
*/
Route::get('/student/school', 'SchoolController@getStudentSchool');
Route::get('/student/assignments', 'AssignmentController@getStudentAssignments');
Route::get('/student/edit/password', 'StudentController@passwordForm');
Route::patch('/student/edit/password', 'StudentController@password');
Route::get('/student/courses', 'CourseController@getStudentCourses');
Route::get('/student/profile', 'StudentController@profile');
Route::resource('/student', 'StudentController');

/*
|--------------------------------------------------------------------------
| employee routes
|--------------------------------------------------------------------------
*/
Route::resource('/employee', 'EmployeeController');

/*
|--------------------------------------------------------------------------
| teacher routes
|--------------------------------------------------------------------------
*/
Route::resource('/teacher', 'TeacherController');

/*
|--------------------------------------------------------------------------
| admin routes
|--------------------------------------------------------------------------
*/
Route::resource('/admin', 'AdminController');

/*
|--------------------------------------------------------------------------
| course routes
|--------------------------------------------------------------------------
*/
Route::get('course/search', 'CourseController@search');
Route::resource('/course', 'CourseController');
Route::get('/course/{course}/questions', 'QuestionController@getQuestionsByOthers');
Route::get('/course/{course}/assignments', 'AssignmentController@getCourseAssignments');
Route::get('/course/{course}/grades', 'CourseController@getGrades');

/*
|--------------------------------------------------------------------------
| assignment routes
|--------------------------------------------------------------------------
*/
Route::resource('/assignment', 'AssignmentController');
Route::get('/assignment/{assignment}/solve', 'AssignmentController@solveForm');
Route::post('/assignment/{assignment}/solve', 'AssignmentController@solve');

/*
|--------------------------------------------------------------------------
| question routes
|--------------------------------------------------------------------------
*/
Route::resource('/question', 'QuestionController');

/*
|--------------------------------------------------------------------------
| activity routes
|--------------------------------------------------------------------------
*/
Route::get('/activity/{activity}/join', 'ActivityController@join');
Route::resource('/activity', 'ActivityController');

/*
|--------------------------------------------------------------------------
| announcement routes
|--------------------------------------------------------------------------
*/
Route::resource('/announcement', 'AnnouncementController');

/*
|--------------------------------------------------------------------------
| report routes
|--------------------------------------------------------------------------
*/
Route::resource('/report', 'ReportController');

// });
