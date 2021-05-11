@extends('main')
@section('page')


    <!-- Button trigger modal -->
    <center> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Leave Info
        </button></center>

    @if(session()->has('success'))

        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <table class="table table_bordered table-hover">
        <thead>

        <th scope="col">ID</th>
        <th scope="col">Employee ID</th>
        <th scope="col">Total Leave</th>
        <th scope="col">Leave Taken</th>
        <th scope="col">Leave Available</th>
        <th scope="col">Leave Reason</th>
        <th scope="col">Actions</th>



        </thead>
        <tbody>

        @foreach($leave as $key=>$data)

            <tr>
                <th scope="row">{{$key+1}}</th>

                <td>{{$data->employee_id}}</td>
                <td>{{$data->total_leave}}</td>
                <td>{{$data->leave_taken}}</td>
                <td>{{$data->leave_available}}</td>
                <td>{{$data->leave_reason}}</td>





                <td>
                    <a class="btn btn-success" href="">View</a>
                    <a class="btn btn-danger" href="{{route('leave.delete',$data->id)}}">Delete</a>
                    <a class="btn btn-info" href="">Edit</a>

                </td>

            </tr>

        @endforeach
        </tbody>
    </table><br>
{{--    {{$leave->links()}}--}}

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Leave</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{--form start--}}

                    <form class="form-horizontal" method="post" action="{{route('leave.create')}}">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">Total Leave </label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="text" class="form-control" name="totalLeave" id="Text" placeholder="" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="cols-sm-2 control-label">Leave Taken</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="text" class="form-control" name="leaveTaken" id="Text" placeholder="" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="cols-sm-2 control-label">Leave Available</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="text" class="form-control" name="leaveAvailable" id="Text" placeholder="" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="cols-sm-2 control-label"></label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <select name="reasonofLeave" id="text">

                                        <option selected disabled >Select Reason</option>
{{--                                        <option value="casual_leave">Casual Leave</option>                                        <option value="casual_leave">Casual Leave</option>--}}

                                       <option value="casual_leave">Casual Leave</option>
                                       <option value="sick_leave">Sick Leave</option>
                                        <option value="manual_leave">Manual Leave</option>

                                    </select>
                                </div>
                            </div>
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
