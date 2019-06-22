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

Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/get-employees', 'EmployeeController@index')->name('get-employees');
Route::get('/create-employee', 'EmployeeController@create')->name('create-employee');
Route::post('/store-employee', 'EmployeeController@store')->name('store-employee');
Route::get('/edit-employee/{id}', 'EmployeeController@edit')->name('edit-employee');
Route::post('/update-employee/{id}', 'EmployeeController@update')->name('update-employee');
Route::get('/delete-employee/{id}', 'EmployeeController@destroy')->name('delete-employee');

Route::get('/get-projects', 'ProjectController@index')->name('get-projects');
Route::get('/create-project', 'ProjectController@create')->name('create-project');
Route::post('/store-project', 'ProjectController@store')->name('store-project');
Route::get('/edit-project/{id}', 'ProjectController@edit')->name('edit-project');
Route::post('/update-project/{id}', 'ProjectController@update')->name('update-project');
Route::get('/delete-project/{id}', 'ProjectController@destroy')->name('delete-project');

Route::get('/get-companies', 'CompanyController@index')->name('get-companies');
Route::get('/create-company', 'CompanyController@create')->name('create-company');
Route::post('/store-company', 'CompanyController@store')->name('store-company');
Route::get('/edit-company/{id}', 'CompanyController@edit')->name('edit-company');
Route::post('/update-company/{id}', 'CompanyController@update')->name('update-company');
Route::get('/delete-company/{id}', 'CompanyController@destroy')->name('delete-company');


Route::get('/chats', 'ChatsController@index')->name('chats');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');

Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

