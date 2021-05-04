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
    <div style="overflow-x:auto;">
    <table class="table table-bordered table-hover">
        <thead>

        <th scope="col">Employee Name</th>
        <th scope="col">1</th>
        <th scope="col">2</th>
        <th scope="col">3</th>
        <th scope="col">4</th>
        <th scope="col">5</th>
        <th scope="col">6</th>
        <th scope="col">7</th>
        <th scope="col">8</th>
        <th scope="col">9</th>
        <th scope="col">10</th>
        <th scope="col">11</th>
        <th scope="col">12</th>
        <th scope="col">13</th>
        <th scope="col">14</th>
        <th scope="col">15</th>
        <th scope="col">16</th>
        <th scope="col">17</th>
        <th scope="col">18</th>
        <th scope="col">19</th>
        <th scope="col">20</th>
        <th scope="col">21</th>
        <th scope="col">22</th>
        <th scope="col">23</th>
        <th scope="col">24</th>
        <th scope="col">25</th>
        <th scope="col">26</th>
        <th scope="col">27</th>
        <th scope="col">28</th>
        <th scope="col">29</th>
        <th scope="col">30</th>




        </thead>
        <tbody>
  @foreach($attendanceRecord as $data)


            <tr>



                <th>

                {{$data->name}}
                </th>

            </tr>

  @endforeach
        </tbody>
    </table>
    </div><br>


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
