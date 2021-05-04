<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Attendance;

use App\Models\Backend\Employee;
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
//dd( date("h:i:sa"));
       $attendance= Attendance::create([
//left side is database column name and right side is form name

           'employee_id'=>auth('web')->user()->id,

            'check_in'=>date("h:i:sa"),
            'date'=>date('Y-m-d'),



        ]);



        return redirect()->route('attendance')->with('success','Checked In Successfully');
    }

    public function attendanceInfoUpdate(Request $request,$id)
    {
        $checkin=Attendance::find($id)->update([

            'check_out'=>date("h:i:sa"),
        ]);
        return redirect()->route('attendance')->with('success','Checked Out Successfully');


    }





    public function attendanceDelete ($id)
    {
        $attendance=Attendance::find($id);
        $attendance->delete();
        return redirect()->route('attendance')->with('success','Attendance Removed Successfully');
    }

    public function attendanceRecord ()
    {
        $attendanceRecord=Employee::all();
        return view ('backend.layouts.attendance.calender',compact('attendanceRecord'));
    }


}
