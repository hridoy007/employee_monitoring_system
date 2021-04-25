<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Department;
use App\Models\Backend\Employee;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function department()
    {
        $department=Department::paginate('2');
        return view('backend.layouts.department.department',compact('department'));
    }

        public function departmentInfo(Request $request)

{
//   dd($request->all());
   Department::create([
            'dept_name'=>$request->deptName,
            'employee_role'=>$request->employeeRoles,
            'total_employee'=>$request->totalEmployee


        ]);
     return redirect()->route('department.view')->with('success','Department Added Successfully');
    }

    public function departmentDelete ($id)
    {
        $department=Department::find($id);
        $department->delete();
        return redirect()->route('department.view')->with('success','Department Removed Successfully');
    }


}
