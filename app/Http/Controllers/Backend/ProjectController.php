<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Backend\Project;
use App\Models\Backend\Projectteam;
use Illuminate\Http\Request;

class ProjectController extends Controller

{
    public function project()
    {
        $projectTeam=Projectteam::all();
        $project=Project::with('projectTeam')->paginate('2');
        return view ('backend.layouts.project.project',compact('project','projectTeam'));
    }
    public function projectDetails(Request $request)
    {
        Project::create([

            'project_name'=>$request->projectName,
            'dept_name'=>$request->deptName,
            'team_id'=>$request->team,
            'deadline'=>$request->date,
            'project_code'=>$request->projectCode,
            'status'=>$request->projectStatus

        ]);

        return redirect()->route('project.view')->with('success','Project Added Successfully');



    }
    public function projectDelete ($id)
    {
        $project=Project::find($id);
        $project->delete();
        return redirect()->route('project.view')->with('success','Project Removed Successfully');
    }

    public function projectEdit($id)
    {
        $project = Project::find($id);
        return view('backend.layouts.project.projectUpdate', compact('project'));
    }

    public function projectUpdate(Request$request,$id)
    {

        Project::find($id)->update([

            'project_name'=>$request->projectName,
            'dept_name'=>$request->deptName,
            'deadline'=>$request->date,
            'project_code'=>$request->projectCode,
            'status'=>$request->projectStatus

        ]);
        return redirect()->route('project.view')->with('success','Project Updated Successfully');
    }

}


