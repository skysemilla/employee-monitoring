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

Route::get('admin/home', 'AdminController@admin')->middleware('admin');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/employee/home', 'EmployeeController@index')->name('employee');