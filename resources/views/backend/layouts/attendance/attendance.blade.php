@extends('main')
@section('page')


    <!-- Button trigger modal -->
    <center> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Attendance
        </button></center>

    @if(session()->has('success'))

        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <table class="table table_bordered table-hover">
        <thead>

        <th scope="col">ID</th>
        <th scope="col">Check In</th>
        <th scope="col">Employee Name</th>
        <th scope="col">Department</th>
        <th scope="col">Actions</th>



        </thead>
        <tbody>

        @foreach($attendance as $key=>$data)

            <tr>
                <th scope="row">{{$key+1}}</th>

                <td>{{$data->check_in}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->department}}</td>




                <td>
                    <a class="btn btn-success" href="">View</a>
                    <a class="btn btn-danger" href="{{route('attendance.delete',$data->id)}}">Delete</a>
                    <a class="btn btn-info" href="">Edit</a>

                </td>

            </tr>

        @endforeach
        </tbody>
    </table><br>
    {{$attendance->links()}}

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Attendance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{--form start--}}

                    <form class="form-horizontal" method="post" action="{{route('attendance.create')}}">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">Check In</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="time" class="form-control" name="time" id="Time" placeholder="Time" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="cols-sm-2 control-label">Employee Name</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="text" class="form-control" name="employeeName" id="Name" placeholder="Name" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="cols-sm-2 control-label">Department</label>
                            <div class="cols-sm-10">
                            </div>
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control" name="deptName" id="Name" placeholder="Department" />
                        </div>

                        <br>


            <div class="form-group ">
                <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Submit</button>
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
    </div>




@endsection
