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
Route::resource('comment', 'CommentController');
Route::resource('log', 'LogController');

Route::get('employee/edit-before-approval/{id}', 'TaskController@editBeforeRating');
Route::post('employee/create-report', 'ReportController@store');
/*Route::post('employee/delete/{$id}', 'TaskController@destroy');
*/
Route::get('employee/view-all-reports', 'ReportController@viewAllReports');
Route::get('employee/view-report/{id}', 'TaskController@viewOwnSpecificReport');
Route::get('employee/create-report', 'ReportController@index')->name('report');
Route::get('employee/template-report/{id}', 'ReportController@template');
Route::post('employee/template-report/{id}', 'ReportController@storeTemplate')->name('storeTemplate');
Route::get('my-profile', 'UserController@employeeProfile');

Route::get('supervisor/report/{id}', 'TaskController@forSupervisorView');
/*Route::post('supervisor/report/{id}', 'ReportController@addComment');*/
Route::get('supervisor/approve/{id}', 'ReportController@updateReportApproved');
Route::get('supervisor/disapprove/{id}', 'ReportController@updateReportDisapproved');
Route::get('headofoffice/disapprove/{id}', 'ReportController@updateReportDiapproveAssessment');
/*Route::post('headofoffice/report/{id}', 'CommentController@addComment');*/
/*Route::post('headofoffice/report/{id}', 'ReportController@forHOOView');*/
Route::get('supervisor/home', 'ReportController@indexForSupervisor');
Route::get('headofoffice/home', 'ReportController@indexForHeadOffice');
Route::get('/home', 'HomeController@index');

Route::get('/admin/accounts/active', 'UserController@viewActiveAccounts');
Route::get('/admin/logs', 'LogController@viewAllLogs');
Route::get('/admin/accounts/deactivated', 'UserController@viewDeactivatedAccounts');
Route::get('admin/activate/{id}', 'UserController@activate');
Route::get('admin/deactivate/{id}', 'UserController@deactivate');
Route::get('admin/accounts/{id}', 'UserController@viewSpecificAccount');

Route::get('supervisor/create-report', 'ReportController@index');
Route::get('supervisor/add-tasks', 'TaskController@indexForSupervisor');
Route::get('supervisor/view-all-reports', 'ReportController@viewAllReports');
Route::get('supervisor/view-report/{id}', 'TaskController@viewOwnSpecificReport');
Route::get('supervisor/view-all-approved-reports', 'ReportController@viewAllApprovedBySupervisor');

Route::get('headofoffice/employee/{id}', 'UserController@viewEmployee');
Route::get('headofoffice/reports-for-approval', 'ReportController@reportsForApprovalHOO');
Route::get('headofoffice/approve/{id}', 'ReportController@updateReportAssessed');
Route::get('headofoffice/report-for-assessment/{id}', 'TaskController@forHOOView');
Route::get('headofoffice/report-for-approval/{id}', 'TaskController@forHOOView');
Route::post('headofoffice/report-for-approval/{id}', 'CommentController@addComment');
Route::get('headofoffice/view-all-approved-reports', 'ReportController@viewAllApprovedByHOO');
Route::get('headofoffice/view-approved-report/{id}', 'TaskController@forHOOView');
Route::get('headofoffice/view-all-assessed-reports', 'ReportController@viewAllAssessed');
Route::get('headofoffice/view-assessed-report/{id}', 'TaskController@forHOOView');
Route::get('headofoffice/nonpermanent-employees/ranking', 'ReportController@showNonpermanentRanking');
Route::get('headofoffice/nonpermanent-employees/ranking/{sem_id}/{year}', 'ReportController@filterNonpermanentRanking');
Route::get('headofoffice/permanent-employees/ranking', 'ReportController@showPermanentRanking');
Route::get('headofoffice/permanent-employees/ranking/{sem_id}/{year}', 'ReportController@filterPermanentRanking');
Route::get('headofoffice/all-permanent-employees', 'UserController@viewAllPermanentEmployees');
Route::get('headofoffice/all-nonpermanent-employees', 'UserController@viewAllNonPermanentEmployees');


Route::get('/pdfmaker/{id}', 'PDFController@make');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

});

