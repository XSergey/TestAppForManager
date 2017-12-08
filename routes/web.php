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
Route::auth();
Route::get('logout', 'Auth\LoginController@logout');

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth'], 'prefix' => 'manager', 'namespace' => '\Manager'], function(){
    Route::resource('/', 'ManagerController');

    /** User resources. */
    Route::resource('users', 'UserController');
    Route::get('users/ajax/get-add-user-form', 'UserController@ajaxGetAddUserForm');
    Route::get('users/ajax/get-edit-user-form/{id}', 'UserController@ajaxGetEditUserForm');

    /** User Group resources. */
    Route::resource('user-groups', 'UsersGroupController');
    Route::get('user-groups/ajax/get-add-group-form', 'UsersGroupController@ajaxGetAddUserGroupForm');
    Route::get('user-groups/ajax/get-edit-group-form/{id}', 'UsersGroupController@ajaxGetEditUserGroupForm');

    Route::get('404', 'ManagerController@pageNotFound');
});

