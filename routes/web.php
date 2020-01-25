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
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
Route::get('/', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('auth.login');
Route::post('logout', 'Auth\LoginController@logout')->name('auth.logout');

Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Auth::routes();

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
	Route::get('/', 'CompanyController@index')->name('home');
	Route::get('/home', 'CompanyController@index')->name('home');
	Route::get('/company', 'CompanyController@index');
	Route::get('/company/companydatatable', 'CompanyController@companydatatable');
	//Route::get('/company/add', 'CompanyController@add');
	Route::POST('/company/form', 'CompanyController@form');
	Route::get('/company/getrow/{id}', 'CompanyController@getrow');
	Route::POST('/company/delete','CompanyController@remove');
	
	Route::get('/employee', 'EmployeeController@index');
	Route::get('/employee/employeedatatable', 'EmployeeController@employeedatatable');
	//Route::get('/employee/add', 'CompanyController@add');
	Route::POST('/employee/form', 'EmployeeController@form');
	Route::get('/employee/getrow/{id}', 'EmployeeController@getrow');
	Route::POST('/employee/delete','EmployeeController@remove');

	
});