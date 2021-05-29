<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function generateReport()
    {
        $report=Employee::all();
        return view('backend.layouts.Report.report',compact('report'));
   }
}
