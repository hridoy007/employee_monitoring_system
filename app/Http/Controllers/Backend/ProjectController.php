<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Department;
use App\Models\Backend\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller

{
    public function project()
    {
        $project=Project::paginate('2');
        return view ('backend.layouts.project.project',compact('project'));
    }
    public function projectDetails(Request $request)
    {
        Project::create([

            'project_name'=>$request->projectName,
            'dept_name'=>$request->deptName,
            'deadline'=>$request->date,
            'project_code'=>$request->projectCode

        ]);

        return redirect()->route('project.view')->with('success','Project Added Successfully');



    }
    public function projectDelete ($id)
    {
        $project=Project::find($id);
        $project->delete();
        return redirect()->route('project.view')->with('success','Project Removed Successfully');
    }
}


