<?php

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

Route::get('/', function () {
    return view('main');
});

//admin
Route::get('/Login',[LoginController::class,'login'])->name('admin.view');
Route::post('/admin/create',[LoginController::class,'loginCreate'])->name('admin.create');
Route::get('/admin/delete/{id}',[LoginController::class,'adminDelete'])->name('admin.delete');

//employee
Route::get('/Employee',[EmployeeController::class,'employee'])->name('employee.view');
Route::post('/employee/details',[EmployeeController::class,'employeeDetails'])->name('employee.list');
Route::get('/employee/delete/{id}',[EmployeeController::class,'employeeDelete'])->name('employee.delete');

//department
Route::get('/Department',[DepartmentController::class,'department'])->name('department.view');
Route::post('/department/info',[DepartmentController::class,'departmentInfo'])->name('department.create');
Route::get('/department/delete/{id}',[DepartmentController::class,'departmentDelete'])->name('department.delete');


//project
Route::get('/Project',[ProjectController::class,'project'])->name('project.view');
Route::post('/project/details',[ProjectController::class,'projectDetails'])->name('project.create');
Route::get('/project/delete/{id}',[ProjectController::class,'projectDelete'])->name('project.delete');


//projectteam
Route::get('/Projectteam',[ProjectteamController::class,'projectteam'])->name ('projectteam');
Route::post('/projectTeam/Info',[ProjectteamController::class,'projectteamInfo'])->name('projectteam.details');
Route::get('/projectteam/delete/{id}',[ProjectteamController::class,'projectteamDelete'])->name('projectteam.delete');


//attendance
Route::get('Attendance',[AttendanceController::class,'attendance'])->name('attendance');
Route::post('/attendance/Info',[AttendanceController::class,'attendanceInfo'])->name('attendance.create');
Route::get('/attendance/delete/{id}',[AttendanceController::class,'attendanceDelete'])->name('attendance.delete');

//leave
Route::get('Leave',[LeaveController::class,'leave'])->name('leave.view');
Route::post('/leave/info',[LeaveController::class,'leaveInfo'])->name('leave.create');
Route::get('/leave/delete/{id}',[LeaveController::class,'leaveDelete'])->name('leave.delete');

