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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Auth', 'middleware' => 'web'], function() {
    Route::get('login',  'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('logout');
});

Route::group(['prefix' => 'admin/users'], function() {
    Route::get('user-permission/{id}', '\DangKien\RolePer\Controllers\UserRoleController@index')->name('user-permission.index');
    Route::post('user-permission/{id}', '\DangKien\RolePer\Controllers\UserRoleController@store')->name('user-permission.store');
    Route::get('role-permission/{id}', '\DangKien\RolePer\Controllers\RolePermissionController@index')->name('roles-permission.index');
    Route::post('role-permission/{id}', '\DangKien\RolePer\Controllers\RolePermissionController@store')->name('roles-permission.store');
});

Route::resource('admin/roles', '\DangKien\RolePer\Controllers\RoleController');
Route::resource('admin/permissions', '\DangKien\RolePer\Controllers\PermissionController');
Route::resource('admin/permissions-group', '\DangKien\RolePer\Controllers\PermissionGroupController');

Route::group(['prefix' => 'admin', 'namespace' => 'Backend'], function() {
    Route::resource('users', 'UserController');

    Route::get('users/profile', 'Backend\UserController@show')->name('users.profile');
    Route::post('users/profile', 'Backend\UserController@updateSeft')->name('users.updateProfile');

    Route::get('users/change-password', 'Backend\UserController@change')->name('users.change');
    Route::post('users/change-password', 'Backend\UserController@changePassword')->name('users.changePassword');

    Route::resource('languages', 'LanguagesController', ['except'=>['destroy']]);

    Route::resource('categories', 'CategoryController', ['except'=>['destroy']]);
});

Route::group(['prefix' => 'rest/admin'], function() {
    Route::get('users', 'Backend\UserController@getList');
    Route::delete('users/{id}', 'Backend\UserController@destroy');

    Route::get('languages', 'Backend\LanguagesController@list');
    Route::delete('languages/{id}', 'Backend\LanguagesController@destroy');
});