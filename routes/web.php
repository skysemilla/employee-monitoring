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

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
/*Route::resource('employee', 'EmployeeController');*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
/*Route::group(['middleware' => 'auth:api'], function() {
  
    Route::post('tasks', 'TaskController@store');

});*/

/*Route::get('/employee/home', function () {
    return view('employee.home');
});

Route::get('/employee/create-report', function () {
    return view('employee.createreport');
});*/

//Route::get('admin/home', 'AdminController@index')->middleware('admin');
//Route::get('admin/home', 'Auth\RegisterController@index')->name('admin');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/employee/home', 'TaskController@index')->name('task');


Route::get('admin/home', 'UserController@index')->name('admin');

//Route::resource('/employee/add-task', 'TaskController');
/*Route::get('/employee/add-task', 'EmployeeController@store')->name('add-task');*/
Route::resource('task', 'TaskController');
Route::resource('category', 'CategoryController');
Route::resource('report', 'ReportController');
/*Route::resource('categories', 'TaskController@getCategories');*/
Route::get('employee/create-report', 'ReportController@index')->name('create-report');