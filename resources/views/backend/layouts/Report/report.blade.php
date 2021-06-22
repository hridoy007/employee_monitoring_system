

@extends('main')
@section('page')

    @if(session()->has('success'))

        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <form action="{{route('generate.report')}}" method="GET">

        <div class="row">
            <div class="col-md-8">
                <div class="row" style="padding: 2px 47px;">

                    <div class="form-group col-md-4">
                        <label for="from"> Date from:</label>
                        <input value="{{$fromDate}}" id="from" type="date" class="form-control" name="from_date">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="to"> Date to:</label>
                        <input value="{{$toDate}}" id="to" type="date" class="form-control" name="to_date">
                    </div>
                    <div style="padding: 31px 2px;" class="form-group col-md-4">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <button type="button" onclick="printDiv()" class="btn btn-success">Print</button>

                    </div>
                </div>
            </div>


        </div>
    </form>

    <div id="printArea" style="background-color: whitesmoke" >
        <table class="table table_bordered table-hover">
            <thead>

            <th scope="col">ID</th>
            <th scope="col">Employee Image</th>
            <th scope="col">Employee Name</th>
            <th scope="col">Designation</th>
            <th scope="col">Department</th>
            <th scope="col">Email</th>




            </thead>
            <tbody>

            @foreach($allEmployee as $key=>$data)

                <tr>
                    <th scope="row">{{$key+1}}</th>

                    <td>

                        <img style="width:50px" src="{{url('/images/admins/',$data->image)}}" alt="Image Not Found">

                    </td>

                    <td>{{$data->name}}</td>
                    <td>{{$data->designation}}</td>
                    <td>{{$data->Department}}</td>
                    <td>{{$data->email}}</td>



                </tr>

            @endforeach
            </tbody>
        </table>

    </div>


    <script type="text/javascript">
        function printDiv(){
            var printContents = document.getElementById("printArea").innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();

            document.body.innerHTML = originalContents;

        }
    </script>

    <br>

@endsection
