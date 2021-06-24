<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Attendance;

use App\Models\Backend\Employee;
use App\Models\Backend\Record;
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
        $check=Attendance::where('employee_id',auth()->user()->id)->whereDate('date',today())->first();
        if($check){
            return redirect()->route('attendance')->with('success','Already Checked In');

        }else{

//dd( date("h:i:sa"));
            $attendance= Attendance::create([
//left side is database column name and right side is form name

                'employee_id'=>auth('web')->user()->id,

                'check_in'=>date("h:i:sa"),
                'date'=>date('Y-m-d'),

            ]);

            Record::create([
               'name'=>auth()->user()->name,
                '1'=>'present'
            ]);



            return redirect()->route('attendance')->with('success','Checked In Successfully');
        }

    }

    public function attendanceInfoUpdate(Request $request,$id)
    {
        $attendance=Attendance::find($id);
        if(!$attendance->check_out)
        {
            $attendance->update([

                'check_out'=>date("h:i:s"),
            ]);
            return redirect()->route('attendance')->with('success','Checked Out Successfully');
        }
        return redirect()->route('attendance')->with('success','Already Checked Out');




    }





    public function attendanceDelete ($id)
    {
        $attendance=Attendance::find($id);
        $attendance->delete();
        return redirect()->route('attendance')->with('success','Attendance Removed Successfully');
    }

    public function attendanceRecord ()
    {
//        @dd(date('m'));
        $attendanceRecord=Attendance::whereMonth('date',date('m'))->get();
//        dd($attendanceRecord);
        return view ('backend.layouts.attendance.calender',compact('attendanceRecord'));
    }


}
