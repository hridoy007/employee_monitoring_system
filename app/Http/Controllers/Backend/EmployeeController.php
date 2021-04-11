<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Employee;


use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function employee()
    {
        return view ('backend.layouts.employee.employee');
    }
    public function employeeDetails(Request $request)
    {
        Employee::create([

            'name'=>$request->name,
            'designation'=>$request->designation,
            'Department'=>$request->department,
            'password'=>$request->password

        ]);

        return redirect()->route('employee');



    }
}
