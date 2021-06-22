<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Admin;
use App\Models\Backend\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function generateReport()
    {

        $allEmployee=[];
        $fromDate=null;
        $toDate=null;

        $title='Employee Report Generate';


        if(isset($_GET['from_date']) && isset($_GET['to_date']) )
        {
            $fromDate=date('Y-m-d',strtotime($_GET['from_date']));
            $toDate=date('Y-m-d',strtotime($_GET['to_date']));

//            $allBooking=Booking::whereDate('booking_from',$fromDate)->get();
            $allEmployee=Admin::orderby('created_at','desc')->whereBetween('created_at',[$fromDate,$toDate])->get();
//            dd($allBooking);
        }

        return view('backend.layouts.Report.report',compact('allEmployee','fromDate','toDate','title'));

    }
}
