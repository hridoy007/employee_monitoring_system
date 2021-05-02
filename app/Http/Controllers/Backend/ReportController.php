<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;


use App\Models\Backend\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report()
    {
        $report = Report::all();
        return view('backend.layouts.report.report', compact('report'));
    }

    public function reportInfo(Request $request)
    {

        Report::create([
//left side is database column name and right side is form name

            'checkIn_time' => $request->time,
            'leave_time' => $request->time,
            'name' => $request->employeeName,
            'department' => $request->deptName,


        ]);

        return redirect()->route('report.view')->with('success','Report Recorded Successfully');
    }
    public function reportDelete ($id)
    {
        $report=Report::find($id);
        $report->delete();
        return redirect()->route('report.view')->with('success','Report Removed Successfully');
    }

}
