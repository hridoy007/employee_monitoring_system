@extends('main')
@section('page')


    <!-- Button trigger modal -->


    @if(session()->has('success'))

        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <table class="table table_bordered table-hover">
        <thead>

        <th scope="col">ID</th>
        <th scope="col">Employee ID</th>
        <th scope="col">Check In</th>
        <th scope="col">Check Out</th>
        <th scope="col">Date</th>
        <th scope="col">Actions</th>



        </thead>
        <tbody>

        @foreach($attendance as $key=>$data)

            <tr>
                <th scope="row">{{$key+1}}</th>

                <td>{{$data->employee_id}}</td>
                <td>{{$data->check_in}}</td>
                <td>{{$data->check_out}}</td>
                <td>{{$data->date}}</td>




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


                    {{--form start--}}

@endsection
