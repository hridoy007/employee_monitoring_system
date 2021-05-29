@extends('main')
@section('page')


    <!-- Button trigger modal -->
    <center> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Add Employee
        </button><a style="margin-left: 20px" href="{{route('generate.report')}}"  class="btn btn-primary"  >
            Generate Report
        </a></center>


    @if(session()->has('success'))

        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <table class="table table_bordered table-hover">
        <thead>

        <th scope="col">ID</th>
        <th scope="col">Employee Image</th>
        <th scope="col">Employee Name</th>
        <th scope="col">Designation</th>
        <th scope="col">Department</th>
        <th scope="col">Email</th>
        <th scope="col">Actions</th>



        </thead>
        <tbody>

        @foreach($employee as $key=>$data)

            <tr>
                <th scope="row">{{$key+1}}</th>

                <td>

                    <img style="width: 100px;" src="{{url('/images/employees/',$data->image)}}" alt="Image Not Found">

                </td>

                <td>{{$data->name}}</td>
                <td>{{$data->designation}}</td>
                <td>{{$data->Department}}</td>
                <td>{{$data->Email}}</td>


                <td>
                    <a class="btn btn-success" href="">View</a>
                    <a class="btn btn-danger" href="{{route('employee.delete',$data->id)}}">Delete</a>
                    <a class="btn btn-info" href="">Edit</a>

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
                    <h5 class="modal-title" id="exampleModalLabel">Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{--form start--}}

                    <form enctype="multipart/form-data" method="post" action="{{route('employee.list')}}">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">Name</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter your Name" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="cols-sm-2 control-label">Designation</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="text" class="form-control" name="designation" id="Designation" placeholder="Role" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="cols-sm-2 control-label">Email</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="text" class="form-control" name="Email" id="Email" placeholder="Email" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="cols-sm-2 control-label">Department</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="text" class="form-control" name="department" id="department" placeholder="department" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="cols-sm-2 control-label">Password</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="text" class="form-control" name="password" id="password" placeholder="Enter Your Password" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="cols-sm-2 control-label">Upload Image</label>
                        </div>


                        <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input type="file" class="form-control" name="employee_image" id="enter" placeholder="Insert Image" />
                        </div>

                        <br>


            <div class="form-group ">
                <button type="submit" name="submit"  class="btn btn-primary btn-lg btn-block login-button">Submit</button>
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
