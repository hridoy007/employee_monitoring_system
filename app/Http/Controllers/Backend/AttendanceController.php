<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function attendance()
    {
        $attendance=Attendance::paginate('2');
        return view ('backend.layouts.attendance.attendance',compact('attendance'));
    }
    public function attendanceInfo(Request $request)
    {

        Attendance::create([
//left side is database column name and right side is form name

            'check_in' => $request->time,
            'name' => $request->employeeName,
            'department' => $request->deptName,



        ]);


        return redirect()->route('attendance');
    }

}
