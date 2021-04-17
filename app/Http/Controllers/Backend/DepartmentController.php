<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function department()
    {
        return view('backend.layouts.department.department');
    }

        public function departmentInfo(Request $request)

{
    Department::create([
            'dept_name'=>$request->name,
            'employee_role'=>$request->employeeRoles,
            'total_employee'=>$request->totalEmployee


        ]);
     return redirect()->route('department');
    }
    //
}
