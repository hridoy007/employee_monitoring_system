<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;


use App\Models\Backend\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function leave()
    {
        $leave=Leave::all();
        return view ('backend.layouts.leave.leave',compact('leave'));
    }
    public function leaveInfo(Request $request)
    {

        Leave::create([
//left side is database column name and right side is form name

            'leave_time' => $request->time,
            'name' => $request->employeeName,
            'department' => $request->deptName,



        ]);


        return redirect()->route('leave.view')->with('success','Leave Recorded Successfully');
    }
    public function leaveDelete ($id)
    {
        $leave=Leave::find($id);
        $leave->delete();
        return redirect()->route('leave.view')->with('success','Leave Removed Successfully');
    }


}

