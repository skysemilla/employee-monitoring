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

Route::get('employee/submit/{id}', 'ReportController@submitToHeadOffice');
Route::resource('task', 'TaskController');
Route::get('register', 'UserController@forRegister')->name('register');
Route::resource('category', 'CategoryController');
Route::resource('report', 'ReportController');
Route::resource('projname', 'ProjnameController');

Route::post('employee/create-report', 'ReportController@store');
Route::get('employee/view-all-reports', 'ReportController@viewAllReports');
Route::get('employee/view-report/{id}', 'TaskController@viewOwnSpecificReport');
Route::get('employee/create-report', 'ReportController@index')->name('report');

Route::get('supervisor/report/{id}', 'TaskController@forSupervisorView');
Route::get('supervisor/approve/{id}', 'ReportController@updateReportApproved');
Route::get('supervisor/home', 'ReportController@indexForSupervisor');
Route::get('headofoffice/home', 'ReportController@indexForHeadOffice');
Route::get('/home', 'HomeController@index');
Route::get('admin/activate/{id}', 'UserController@activate');
Route::get('admin/deactivate/{id}', 'UserController@deactivate');
Route::get('admin/accounts/{id}', 'UserController@viewSpecificAccount');
Route::get('supervisor/create-report', 'ReportController@index');
Route::get('supervisor/add-tasks', 'TaskController@indexForSupervisor');
Route::get('supervisor/view-all-reports', 'ReportController@viewAllReports');
Route::get('supervisor/view-report/{id}', 'TaskController@viewOwnSpecificReport');
Route::get('supervisor/view-all-approved-reports', 'ReportController@viewAllApprovedBySupervisor');

Route::get('headofoffice/reports-for-approval', 'ReportController@reportsForApprovalHOO');
Route::get('headofoffice/approve/{id}', 'ReportController@updateReportAssessed');
Route::get('headofoffice/report-for-assessment/{id}', 'TaskController@forHOOView');
Route::get('headofoffice/view-all-approved-reports', 'ReportController@viewAllApprovedByHOO');
Route::get('headofoffice/view-approved-report/{id}', 'TaskController@forHOOView');
Route::get('headofoffice/view-all-assessed-reports', 'ReportController@viewAllAssessed');
Route::get('headofoffice/view-assessed-report/{id}', 'TaskController@forHOOView');
Route::get('/pdfmaker/{id}', 'PDFController@make');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

});

