@extends('main')
@section('page')


    <!-- Button trigger modal -->
    <center> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Project Management
        </button></center>

    @if(session()->has('success'))

        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <table class="table table_bordered table-hover">
        <thead>

        <th scope="col">ID</th>
        <th scope="col">Team Name</th>
        <th scope="col">Project Code</th>
        <th scope="col">Actions</th>



        </thead>
        <tbody>

        @foreach($projectteam as $key=>$data)

            <tr>
                <th scope="row">{{$key+1}}</th>

                <td>{{$data->name}}</td>
                <td>{{$data->project_code}}</td>




                <td>
                    <a class="btn btn-success" href="">View</a>
                    <a class="btn btn-danger" href="{{route('projectteam.delete',$data->id)}}">Delete</a>
                    <a class="btn btn-danger" href="{{route('projectteam.edit',$data->id)}}">Edit</a>


                </td>

            </tr>

        @endforeach
        </tbody>
    </table><br>
    {{$projectteam->links()}}

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Project Team</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    {{--form start--}}

                    <form class="form-horizontal" method="post" action="{{route('projectteam.update')}}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">Team Name</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input value="{{$projectteam->name}}" type="text" class="form-control" name="teamName" id="name" placeholder="Name" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="cols-sm-2 control-label">Project Code</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input value="{{$projectteam->project_code}}" type="text" class="form-control" name="projectCode" id="Code" placeholder="Code" />
                                </div>
                            </div>
                        </div>



                        <br>
                        <div class="form-group ">
                            <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Submit</button>
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
