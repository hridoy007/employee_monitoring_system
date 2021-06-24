@extends('main')
@section('page')


    <!-- Button trigger modal -->
   <center> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Admin create
    </button></center>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif

    @if(session()->has('success'))

        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif



    <table class="table table_bordered table-hover">
        <thead>

        <th scope="col">ID</th>
        <th scope="col">Admin Image</th>
        <th scope="col">Admin Name</th>
        <th scope="col">Email</th>
{{--        <th scope="col">Admin Photo</th>--}}
{{--        <th scope="col">Actions</th>--}}


        </thead>
        <tbody>

        @foreach($admin as $key=>$data)

            <tr>
                <th scope="row">{{$key+1}}</th>

                <td>

                    <img style="width: 100px;" src="{{url('/images/admins/',$data->image)}}" alt="Image Not Found">

</td>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>

                <td>
                    <a class="btn btn-success" href="">View</a>
              <a class="btn btn-danger" href="{{route('admin.delete',$data->id)}}">Delete</a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                           {{--form start--}}

                    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{route('admin.create')}}">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">Enter Name</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input  type="text" class="form-control" name="name" id="name" placeholder="Name" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="cols-sm-2 control-label">Email</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" />
                                </div>
                            </div>
                        </div>

                        <br>
                        <select name="role" id="">

                            <option value="" disabled selected>Select Role Of the Admin</option>
                            <option value="admin">Admin</option>
                            <option value="employee">Employee</option>

                        </select>
                        <br>
                        <br>



                        <div class="form-group">
                            <label for="password" class="cols-sm-2 control-label">Password</label>
                        </div>


                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="password" class="form-control" name="password" id="enter" placeholder="Enter your Password" />
                                </div>

                        <br>
                        <div class="form-group">
                            <label for="" class="cols-sm-2 control-label">Upload Image</label>
                        </div>


                        <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input type="file" class="form-control" name="admin_image" id="enter" placeholder="Insert Image" />
                        </div>

                        <br>




                        <div class="form-group ">
                            <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Submit</button>
                        </div>
                    </form>

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

@endsection
