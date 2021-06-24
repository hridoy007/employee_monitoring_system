<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\admin;
use App\Models\Backend\Employee;


use App\Models\Backend\Projectteam;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function employee()
    {
        $teams=Projectteam::all();
        $employee = Admin::with('employee')->where('role','employee')->get();
        return view('backend.layouts.employee.employee', compact('employee','teams'));
    }

    public function employeeDetails(Request $request)
    {

        $request->validate([

            'email'=>'required|email|unique:admins'

        ]);

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
            'team_id'=>$request->team,
            'email' => $request->email,
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

        $teams=Projectteam::all();

        $employee = Admin::find($id);
        return view('backend.layouts.employee.employeeUpdate', compact('employee','teams'));
    }

    public function employeeUpdate(Request$request,$id)
    {

        Admin::find($id)->update([

            'name' => $request->name,
            'designation' => $request->designation,
            'Department' => $request->department,
            'team_id'=>$request->team,
            'Email' => $request->Email,
            'password' => $request->password

        ]);
        return redirect()->route('employee.view')->with('success','Employee Updated Successfully');
    }
}
