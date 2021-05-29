

@extends('main')
@section('page')

    @if(session()->has('success'))

        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif


<center> <button type="button" onclick="printDiv()" class="btn btn-success" style="margin-bottom: 50px;margin-top: 50px">Print</button></center>

    <div id="printArea" style="background-color: greenyellow" >
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

            @foreach($report as $key=>$data)

                <tr>
                    <th scope="row">{{$key+1}}</th>

                    <td>

                        <img style="width:50px" src="{{url('/images/employees/',$data->image)}}" alt="Image Not Found">

                    </td>

                    <td>{{$data->name}}</td>
                    <td>{{$data->designation}}</td>
                    <td>{{$data->Department}}</td>
                    <td>{{$data->Email}}</td>



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
