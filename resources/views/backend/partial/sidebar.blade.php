<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>

            @if(auth()->user()->role=='admin')
            <li><a class="has-arrow" href="{{route('dashboard.view')}}" aria-expanded="false"><i
                        class="icon icon-world-2"></i><span style="color: white" class="nav-text">Dashboard</span></a>


            </li>



            <li><a class="has-arrow" href="{{route('admin.view')}}" aria-expanded="false"><i
                        class="icon icon-single-04"></i><span style="color: white" class="nav-text">Admin</span></a>


            </li>


            <li><a class="has-arrow" href="{{route('employee.view')}}" aria-expanded="false"><i
                        class="icon icon-single-04"></i><span style="color: white" class="nav-text">Employee</span></a>

            </li>
            <li><a class="has-arrow" href="{{route('department.view')}}" aria-expanded="false"><i
                        class="icon icon-app-store"></i><span style="color: white" class="nav-text">Department</span></a>


            </li>

            <li><a class="has-arrow" href="{{route('project.view')}}" aria-expanded="false"><i
                        class="icon icon-chart-bar-33"></i><span style="color: white" class="nav-text">Project</span></a>


            </li>



            <li><a class="has-arrow" href="{{route('projectteam')}}" aria-expanded="false"><i
                        class="icon icon-plug"></i><span style="color: white" class="nav-text">Project Team</span></a>

            </li>



            <li><a class="has-arrow" href="{{route('attendance')}}" aria-expanded="false"><i
                        class="icon icon-single-04"></i><span style="color: white" class="nav-text">Attendance</span></a>

            </li>

            <li><a class="has-arrow" href="{{route('attendance.record')}}" aria-expanded="false"><i
                        class="icon icon-single-04"></i><span style="color: white" class="nav-text">Attendance Record</span></a>

            </li>


            <li><a class="has-arrow" href="{{route('leave.view')}}" aria-expanded="false"><i
                        class="icon icon-single-04"></i><span style="color: white" class="nav-text">Leave</span></a>

            </li>

            @endif


            @if(auth()->user()->role=='employee')
            <li><a class="has-arrow" href="{{route('dashboard.view')}}" aria-expanded="false"><i
                        class="icon icon-world-2"></i><span style="color: white" class="nav-text">Dashboard</span></a>


            </li>
            <li><a class="has-arrow" href="{{route('project.view')}}" aria-expanded="false"><i
                        class="icon icon-chart-bar-33"></i><span style="color: white" class="nav-text">Project</span></a>


            </li>

            <li><a class="has-arrow" href="{{route('attendance.record')}}" aria-expanded="false"><i
                        class="icon icon-single-04"></i><span style="color: white" class="nav-text">Attendance Record</span></a>

            </li>

            <li><a class="has-arrow" href="{{route('leave.view')}}" aria-expanded="false"><i
                        class="icon icon-single-04"></i><span style="color: white" class="nav-text">Leave</span></a>

            </li>
            @endif



        </ul>
    </div>


</div>
