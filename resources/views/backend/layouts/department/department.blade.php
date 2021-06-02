@extends('main')
@section('page')


    <!-- Button trigger modal -->
    <center> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Department Info
        </button></center>


    @if(session()->has('success'))

        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif


    <table class="table table_bordered table-hover">
        <thead>

        <th scope="col">ID</th>
        <th scope="col">Department Name</th>
        <th scope="col">Employee Role</th>
        <th scope="col">Total Employee</th>
        <th scope="col">Actions</th>


        </thead>
        <tbody>

        @foreach($department as $key=>$data)

            <tr>
                <th scope="row">{{$key+1}}</th>

                <td>{{$data->dept_name}}</td>
                <td>{{$data->employee_role}}</td>
                <td>{{$data->total_employee}}</td>

                <td>
                    <a class="btn btn-success" href="">View</a>
                    <a class="btn btn-danger" href="{{route('department.delete',$data->id)}}">Delete</a>
                    <a class="btn btn-info" href="{{route('department.edit',$data->id)}}">Edit</a>

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
                    <h5 class="modal-title" id="exampleModalLabel">Department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{--form start--}}

                    <form class="form-horizontal" method="post" action="{{route('department.create')}}">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">Department</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="text" class="form-control" name="deptName" id="name" placeholder="Name" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="cols-sm-2 control-label">Employee Role</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="text" class="form-control" name="employeeRoles" id="Name" placeholder="Name" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="cols-sm-2 control-label">Total Employee</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="text" class="number" name="totalEmployee"  />
                                </div>
                            </div>
                        </div>




                        <br>
                        <div class="form-group ">
                            <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Add Department</button>
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
