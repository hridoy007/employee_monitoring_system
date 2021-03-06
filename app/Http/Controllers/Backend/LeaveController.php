<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;


use App\Models\Backend\Employee;
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
            'employee_id'=>auth()->user()->id,
            'total_leave' => $request->totalLeave,
            'leave_taken' => $request->leaveTaken,
            'leave_available' => $request->leaveAvailable,
            'leave_reason' => $request->reasonofLeave,



        ]);


        return redirect()->route('leave.view')->with('success','Leave Recorded Successfully');
    }
    public function leaveDelete ($id)
    {
        $leave=Leave::find($id);
        $leave->delete();
        return redirect()->route('leave.view')->with('success','Leave Removed Successfully');
    }

    public function leaveEdit($id)
    {
        $leave = Leave::find($id);
        return view('backend.layouts.leave.leaveUpdate', compact('leave'));
    }

    public function leaveUpdate(Request$request,$id)
    {

        Leave::find($id)->update([

            'employee_id'=>auth()->user()->id,
            'total_leave' => $request->totalLeave,
            'leave_taken' => $request->leaveTaken,
            'leave_available' => $request->leaveAvailable,
            'leave_reason' => $request->reasonofLeave,


        ]);
        return redirect()->route('leave.view')->with('success','Leave Updated Successfully');
    }



}

