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



Route::group(['middleware' => 'prevent-back-history'],function(){
  Auth::routes();
 Route::get('/', function () {
    return view('welcome');
});
 Route::get('/employee/home', 'TaskController@index')->name('task');


Route::get('admin/home', 'UserController@index')->name('admin');

//Route::resource('/employee/add-task', 'TaskController');
/*Route::get('/employee/add-task', 'EmployeeController@store')->name('add-task');*/
Route::resource('task', 'TaskController');
Route::get('register', 'UserController@forRegister')->name('register');
Route::resource('category', 'CategoryController');
Route::resource('report', 'ReportController');
//Route::resource('supervisor', 'SupervisorController');
/*Route::resource('categories', 'TaskController@getCategories');*/
Route::post('employee/create-report', 'ReportController@store');

/*Route::get('register', '\App\Http\Controllers\Auth\RegisterController@index');*/
Route::get('employee/create-report', 'ReportController@index')->name('report');
Route::get('supervisor/report/{id}', 'TaskController@forSupervisorView');
Route::get('supervisor/approve/{id}', 'ReportController@updateReportApproved');
Route::get('supervisor/home', 'ReportController@indexForSupervisor');
Route::get('/home', 'HomeController@index');
/*Route::get('/admin/home', 'UserController@getReports')->name('getReports');*/

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

});

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
//Route::get('/home', 'HomeController@index')->name('home');
