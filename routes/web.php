<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\ProjectteamController;
use App\Http\Controllers\Backend\AttendanceController;
use App\Http\Controllers\Backend\LeaveController;


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
//dashboard
Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard.view');

//loginPage
Route::get('Admin', [AdminController::class, 'admin'])->name('admin.page');
Route::post('/admin/validate', [AdminController::class, 'adminValidate'])->name('admin.validate');




Route::group(['middleware'=>'auth'],function () {


    Route::get('/', function () {
        return view('main');
    });

    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard.view');


//admin
    Route::get('/Login', [LoginController::class, 'login'])->name('admin.view');
    Route::post('/admin/create', [LoginController::class, 'loginCreate'])->name('admin.create');
    Route::get('/admin/delete/{id}', [LoginController::class, 'adminDelete'])->name('admin.delete');

//employee
    Route::get('/Employee', [EmployeeController::class, 'employee'])->name('employee.view');
    Route::post('/employee/details', [EmployeeController::class, 'employeeDetails'])->name('employee.list');
    Route::get('/employee/delete/{id}', [EmployeeController::class, 'employeeDelete'])->name('employee.delete');
    Route::get('/employee/edit/{id}', [EmployeeController::class, 'employeeEdit'])->name('employee.edit');
    Route::put('/employee/update/{id}', [EmployeeController::class, 'employeeUpdate'])->name('employee.update');

//department
    Route::get('/Department', [DepartmentController::class, 'department'])->name('department.view');
    Route::post('/department/info', [DepartmentController::class, 'departmentInfo'])->name('department.create');
    Route::get('/department/delete/{id}', [DepartmentController::class, 'departmentDelete'])->name('department.delete');
    Route::get('/department/edit/{id}', [DepartmentController::class, 'departmentEdit'])->name('department.edit');
    Route::put('/department/update/{id}', [DepartmentController::class, 'departmentUpdate'])->name('department.Update');



//project
    Route::get('/Project', [ProjectController::class, 'project'])->name('project.view');
    Route::post('/project/details', [ProjectController::class, 'projectDetails'])->name('project.create');
    Route::get('/project/delete/{id}', [ProjectController::class, 'projectDelete'])->name('project.delete');
    Route::get('/project/edit/{id}', [ProjectController::class, 'projectEdit'])->name('project.edit');
    Route::put('/project/update/{id}', [ProjectController::class, 'projectUpdate'])->name('project.update');


//projectteam
    Route::get('/Projectteam', [ProjectteamController::class, 'projectteam'])->name('projectteam');
    Route::post('/projectTeam/Info', [ProjectteamController::class, 'projectteamInfo'])->name('projectteam.details');
    Route::get('/projectteam/delete/{id}', [ProjectteamController::class, 'projectteamDelete'])->name('projectteam.delete');
    Route::get('/projectteam/edit/{id}', [ProjectteamController::class, 'projectteamEdit'])->name('projectteam.edit');
    Route::put('/projectteam/update/{id}', [ProjectteamController::class, 'projectteamUpdate'])->name('projectteam.update');


//attendance
    Route::get('Attendance', [AttendanceController::class, 'attendance'])->name('attendance');
    Route::post('/attendance/Info', [AttendanceController::class, 'attendanceInfo'])->name('attendance.create');
    Route::get('/attendance/Info/update/{id}', [AttendanceController::class, 'attendanceInfoUpdate'])->name('attendance.update.create');
    Route::get('/attendance/delete/{id}', [AttendanceController::class, 'attendanceDelete'])->name('attendance.delete');

//Project Team Employees
    Route::get('/project/team/employees/{id}',[ProjectteamController::class,'projectEmployeeView'])->name('project.employee.view');

//leave
    Route::get('Leave', [LeaveController::class, 'leave'])->name('leave.view');
    Route::post('/leave/info', [LeaveController::class, 'leaveInfo'])->name('leave.create');
    Route::get('/leave/delete/{id}', [LeaveController::class, 'leaveDelete'])->name('leave.delete');
    Route::get('/leave/edit/{id}', [LeaveController::class, 'leaveEdit'])->name('leave.edit');
    Route::put('/leave/update/{id}', [LeaveController::class, 'leaveUpdate'])->name('leave.update');

//report
//    Route::get('Report', [ReportController::class, 'report'])->name('report.view');
//    Route::post('/report/info', [ReportController::class, 'reportInfo'])->name('report.create');
//    Route::get('/report/delete/{id}', [ReportController::class, 'reportDelete'])->name('report.delete');

//logout
    Route::get('/admin/logout',[AdminController::class,'adminLogout'])->name('admin.logout');


 //calender
    Route::get('/attendance/record',[AttendanceController::class,'attendanceRecord'])->name('attendance.record');
//generate report
    Route::get('/generate/report',[ReportController::class,'generateReport'])->name('generate.report');

});
