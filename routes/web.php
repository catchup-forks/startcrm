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

Auth::routes();
Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);

// temp route to display theme pages, remember to delete before going live
Route::get('/temp', function () {
    return view('form');
});

Route::get('/', 'HomeController@index');
Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/support', ['as' => 'support', 'uses' => 'HomeController@support']);

Route::group(['prefix' => 'user'], function () {
    Route::get('/profile', ['as' => 'user.profile', 'uses' => 'UserController@profile']);
    Route::get('/settings', ['as' => 'user.settings', 'uses' => 'UserController@settings']);
    Route::post('/changepass', ['as' => 'user.changepass', 'uses' => 'UserController@changePassword']);
    Route::post('/editprofile', ['as' => 'user.editprofile', 'uses' => 'UserController@editProfile']);
});

Route::group(['prefix' => 'course'], function () {
    Route::get('/assigned', ['as' => 'course.assigned', 'uses' => 'CourseController@assigned']);
    Route::get('/non-assigned', ['as' => 'course.non-assigned', 'uses' => 'CourseController@nonassigned']);
});

Route::group(['prefix' => 'event'], function () {
    Route::get('/journey', ['as' => 'event.journey', 'uses' => 'EventController@journey']);
});

Route::group(['prefix' => 'project'], function () {
    Route::get('/index', ['as' => 'project.index', 'uses' => 'ProjectController@index']);
});

// admin routes
Route::group(['prefix' => 'manage'], function () {
    // annoucement routes
    Route::group(['prefix' => 'annoucement'], function () {
        Route::get('/', ['as' => 'manage.annoucement', 'uses' => 'AnnoucementController@index']);
        Route::post('/create', ['as' => 'manage.annoucement.create', 'uses' => 'AnnoucementController@create']);
    });

    // user routes
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', ['as' => 'manage.users', 'uses' => 'ManageUsersController@index']);
        Route::get('/adduser', ['as' => 'manage.users.adduser', 'uses' => 'ManageUsersController@adduser']);
        Route::post('/create', ['as' => 'manage.users.create', 'uses' => 'ManageUsersController@create']);
    });

    Route::get('/awards', ['as' => 'manage.awards', 'uses' => 'AdminViewController@awards']);
    Route::get('/committees', ['as' => 'manage.committees', 'uses' => 'AdminViewController@committees']);
    Route::get('/courses', ['as' => 'manage.courses', 'uses' => 'AdminViewController@courses']);
    Route::get('/projects', ['as' => 'manage.projects', 'uses' => 'AdminViewController@projects']);
});
