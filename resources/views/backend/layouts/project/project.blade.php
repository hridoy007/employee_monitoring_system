@extends('main')
@section('page')


    <!-- Button trigger modal -->
    @if(auth()->user()->role=='admin')
    <center> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Project Details
        </button></center>
    @endif

    @if(session()->has('success'))

        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <table class="table table_bordered table-hover">
        <thead>

        <th scope="col">ID</th>
        <th scope="col">Project Name</th>
        <th scope="col">Department</th>
        <th scope="col">Team</th>
        <th scope="col">Deadline</th>
        <th scope="col">Project Status</th>

        {{--        <th scope="col">Employee Photo</th>--}}
        @if(auth()->user()->role=='admin')

            <th scope="col">Actions</th>
        @endif


        </thead>
        <tbody>

        @foreach($project as $key=>$data)

            <tr>
                <th scope="row">{{$key+1}}</th>

                <td>{{$data->project_name}}</td>
                <td>{{$data->dept_name}}</td>
                <td>{{$data->projectTeam->name}}</td>
                <td>{{$data->deadline}}</td>
                <td>{{$data->status}}</td>




                <td>
                    @if(auth()->user()->role=='admin')
                        <a class="btn btn-success" href="">View</a>
                        <a class="btn btn-danger" href="{{route('project.delete',$data->id)}}">Delete</a>
                    <a class="btn btn-info" href="{{route('project.edit',$data->id)}}">Edit</a>
                    @endif
                </td>

            </tr>

        @endforeach
        </tbody>
    </table><br>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{--form start--}}

                    <form class="form-horizontal" method="post" action="{{route('project.create')}}">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">Project Name</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="text" style="color: #1a202c" class="form-control" name="projectName" id="name" placeholder="Name" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="cols-sm-2 control-label">Department</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="text" class="form-control" name="deptName" id="Name" placeholder="Name" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="cols-sm-2 control-label">Team</label>
                            <div class="cols-sm-10">
                                <div class="input-group">

                                    <select required name="team" id="">

                                        <option value="" disabled selected  >Select a team for this Project</option>
                                        @foreach($projectTeam as $data)
                                            <option value="{{$data->id}}">{{$data->name}}</option>

                                        @endforeach

                                    </select>

                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="email" class="cols-sm-2 control-label">Project Status</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <select name="projectStatus" id="">

                                        <option selected>Select Status</option>
                                        <option value="upcoming">Upcoming Project</option>
                                        <option value="running">Running Project</option>
                                        <option value="completed">Completed Project</option>

                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="username" class="cols-sm-2 control-label">Deadline</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="date" class="number" name="date" id="Date" placeholder="Last Date of submission" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="cols-sm-2 control-label">Project Code</label>
                            <div class="cols-sm-10">
                            </div>
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control" name="projectCode" id="projectCode" placeholder="Code" />
                        </div>

                        <br>
                        <div class="form-group ">
                            <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Submit</button>
                        </div>
                </div>
            </div>


            </form>
        </div>

    </div>
    </div>
    </div>
    </div>


    </div>

    </div>
    </div>
    </div>

@endsection
