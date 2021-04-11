<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\ProjectteamController;
use App\Http\Controllers\Backend\AttendanceController;

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

//employee
Route::get('/Employee',[EmployeeController::class,'employee'])->name('employee');
Route::post('/employee/details',[EmployeeController::class,'employeeDetails'])->name('employee.list');

//department
Route::get('/Department',[DepartmentController::class,'department'])->name('department');

//project
Route::get('/Project',[ProjectController::class,'project'])->name('project');

//projectteam
Route::get('/projectteam',[ProjectteamController::class,'projectteam'])->name ('projectteam');

//attendance
Route::get('Attendance',[AttendanceController::class,'attendance'])->name('attendance');
