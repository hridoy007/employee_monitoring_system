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

        <th style="color: black" scope="col">ID</th>
        <th style="color: black" scope="col">Employee ID</th>
        <th style="color: black" scope="col">Check In</th>
        <th style="color: black" scope="col">Check Out</th>
        <th style="color: black" scope="col">Date</th>
        <th style="color: black" scope="col">Actions</th>



        </thead>
        <tbody>

        @foreach($attendance as $key=>$data)

            <tr>
                <th scope="row">{{$key+1}}</th>

                <td style="color: blue">{{$data->employee_id}}</td>
                <td style="color: olive">{{$data->check_in}}</td>
                <td style="color: firebrick">{{$data->check_out}}</td>
                <td style="color: indigo">{{$data->date}}</td>




                <td>
                    <a class="btn btn-success" href="{{route('attendance.update.create',$data->id)}}">Check Out</a>
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
