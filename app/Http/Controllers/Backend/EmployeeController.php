<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\admin;
use App\Models\Backend\Employee;


use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function employee()
    {
        $employee=Employee::all();
        return view ('backend.layouts.employee.employee',compact('employee'));
    }
    public function employeeDetails(Request $request)
    {
        $user_file = "";

        if ($request->hasFile('employee_image')) {

            $file = $request->file('employee_image');
            if ($file->isValid()) {

                $user_file = date('Ymdhms') . "." . $file->getClientOriginalExtension();
                $file->storeAs('employees', $user_file);
            }
        }
        Employee::create([

            'name'=>$request->name,
            'designation'=>$request->designation,
            'Department'=>$request->department,
            'Email'=>$request->Email,
            'image'=>$user_file,
            'password'=>$request->password

        ]);

        return redirect()->route('employee.view')->with('success','Employee Added Successfully');



    }

    public function employeeDelete ($id)
    {
        $employee=Employee::find($id);
        $employee->delete();
        return redirect()->route('employee.view')->with('success','Employee Removed Successfully');
    }
}
