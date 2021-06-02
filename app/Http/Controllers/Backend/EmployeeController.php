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
        $employee = Admin::where('role','employee')->get();
        return view('backend.layouts.employee.employee', compact('employee'));
    }

    public function employeeDetails(Request $request)
    {
        $user_file = "";

        if ($request->hasFile('employee_image')) {

            $file = $request->file('employee_image');
            if ($file->isValid()) {

                $user_file = date('Ymdhms') . "." . $file->getClientOriginalExtension();
                $file->storeAs('admins', $user_file);
            }
        }
        Admin::create([

            'name' => $request->name,
            'designation' => $request->designation,
            'department' => $request->department,
            'email' => $request->Email,
            'image' => $user_file,
            'password' => bcrypt($request->password)

        ]);

        return redirect()->route('employee.view')->with('success', 'Employee Added Successfully');


    }

    public function employeeDelete($id)
    {
        $employee = Admin::find($id);
        $employee->delete();
        return redirect()->route('employee.view')->with('success', 'Employee Removed Successfully');
    }


    public function employeeEdit($id)
    {
        $employee = Admin::find($id);
        return view('backend.layouts.employee.employeeUpdate', compact('employee'));
    }

    public function employeeUpdate(Request$request,$id)
    {

        Admin::find($id)->update([

            'name' => $request->name,
            'designation' => $request->designation,
            'Department' => $request->department,
            'Email' => $request->Email,
            'password' => $request->password

        ]);
        return redirect()->route('employee.view')->with('success','Employee Updated Successfully');
    }
}
