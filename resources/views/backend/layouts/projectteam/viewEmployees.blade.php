@extends('main')
@section('page')


    <!-- Button trigger modal -->


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

        <th style="color: #1a202c" scope="col">ID</th>
        <th style="color: #1a202c" scope="col">Employee Image</th>
        <th style="color: #1a202c" scope="col">Employee Name</th>
        <th style="color: #1a202c" scope="col">Designation</th>
        <th style="color: #1a202c" scope="col">Department</th>
        <th style="color: #1a202c" scope="col">Team</th>
        <th style="color: #1a202c" scope="col">Email</th>
{{--        <th style="color: #1a202c" scope="col">Actions</th>--}}



        </thead>
        <tbody>

        @foreach($employee as $key=>$data)

            <tr>
                <th scope="row">{{$key+1}}</th>

                <td>

                    <img style="width: 100px;" src="{{url('/images/admins/',$data->image)}}" alt="Image Not Found">

                </td>

                <td style="color: #1a202c">{{$data->name}}</td>
                <td style="color: #1a202c">{{$data->designation}}</td>
                <td style="color: #1a202c">{{$data->Department}}</td>
                <td style="color: #1a202c">{{$data->employee->name}}</td>
                <td style="color: #1a202c">{{$data->email}}</td>


{{--                <td>--}}
{{--                    <a class="btn btn-success" href="">View</a>--}}
{{--                    <a class="btn btn-danger" href="{{route('employee.delete',$data->id)}}">Delete</a>--}}
{{--                    <a class="btn btn-info" href="{{route('employee.edit',$data->id)}}">Edit</a>--}}

{{--                </td>--}}

            </tr>

        @endforeach
        </tbody>
    </table><br>

    <!-- Modal -->

    </div>


    </div>

    </div>
    </div>
    </div>

@endsection
