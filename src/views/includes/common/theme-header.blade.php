<header>
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="{{route('dashboard')}}">
                    <img class="img-responsive" alt="uitouxsolutions.com" src="{{ URL::asset('public/img/logo.svg') }}"/>
                </a>
                <div class="navbar-toggle-btn">
                    <button type="button" id="toggle-btn" class="navbar-toggle navbar-toggle-icon" data-target="#mobile-navbar-collapse-1">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
                <div class="notify-btn">
                    <a href="#"  onclick="_pcq.push(['triggerOptIn']);">
                        <i class="ion-android-notifications-none"></i>
                    </a>
                </div>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <!-- <li>
                        <a href="#!" class=""><span class="dashboard-menu-icon"></span>Dashboard</a>
                    </li> -->
                    @if(Entrust::can('projects'))
                        <li>
                            <a href="{{route('listProject')}}" class="filter"><span class="project-menu-icon"></span>Projects</a>
                        </li>
                    @endif

                    @if(Entrust::can('tasks'))
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="task-menu-icon"></span>Tasks</a>
                            <ul class="dropdown-menu">
                                <!-- change after new client list  -->
                                 @if(Auth::user()->portal_role_id==6 || Auth::user()->portal_role_id==7)
                                    <li><a href='{{route("listTask",["type"=>"pending"])}}'>Pending</a></li>
                                    <li><a href='{{route("listTask",["type" => "completed"])}}'>Completed</a></li>
                                @else
                                    <li><a href='{{route("listTask",["type"=>"pending"])}}'>Pending</a></li>
                                    <li><a href='{{route("listTask",["type" => "completed"])}}'>Completed</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if(Entrust::can('Team Tasks'))
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="task-menu-icon"></span>My Tasks</a>
                            <ul class="dropdown-menu">
                                <li><a href='{{route("taskListTM",["type"=>"pending"])}}'>Pending</a></li>
                                <li><a href='{{route("taskListTM",["type" => "completed"])}}'>Completed</a></li>
                            </ul>
                        </li>
                    @endif
                    @if(Entrust::can('Client tickets') && Entrust::can('Support tickets'))
                        <li class="dropdown">
                            <a href='{{route("supportTicketList")}}'  role="button">
                                <span class="task-menu-icon"></span>Tickets</a>
                        </li>
                    @elseif(Entrust::can('Client tickets'))
                        <li class="dropdown">
                            <a href='{{route("ticketList")}}'  role="button">
                                <span class="task-menu-icon"></span>Tickets</a>
                        </li>
                    @elseif(Entrust::can('Support tickets'))
                        <li class="dropdown">
                            <a href='{{route("supportTicketList")}}'  role="button">
                                <span class="task-menu-icon"></span>Tickets</a>
                        </li>
                    @endif

                    <li>
                        <a href="{{route('listCalendar')}}" class="filter"><span class="calendar-menu-icon"></span>Calendar</a>
                    </li>

                    @if(Entrust::can('Gallery'))
                    <li class="hide">
                        <a href="#" class="filter"><span class="dashboard-menu-icon"></span>Gallery</a>
                    </li>
                    @endif

                    <li>
                        <a href="#" class="filter"><span class="asset-menu-icon"></span>Assets</a>
                    </li>

                    @if(Entrust::can('HR'))
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="hr-menu-icon"></span>HR</a>
                        <ul class="dropdown-menu divider-menu">
                            <li><a href='{{route("punchList")}}'>Punches</a></li>
                            <li><a href='{{route("breakList")}}'>Breaks</a></li>
                            <li><a href='{{route("leaveList")}}'>Leaves</a></li>
                            @if(Entrust::can('Leave approver'))
                                <li><a href='{{route("approveList")}}'>Leave Approval</a></li>
                            @endif
                            <li><a href='{{route("listEmployee")}}'>Employees</a></li>
                            <li><a href="#">Interviews</a></li>
                            <li><a href='{{route("listWorkLogs")}}'>Work Logs</a></li>
                            <li><a href='{{route("listCurrentWorkStatus")}}'>Current Work Status</a></li>
                        </ul>
                    </li>
                    @endif

                    @if(Entrust::can('masters'))
                        <li class="dropdown " id="masters" >
                            <a href="#"    class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="masters-menu-icon"></span>Masters</a>
                            <ul class="dropdown-menu divider-menu">
                                @if(Entrust::can('users'))
                                    <li><a href="{{route('listUser')}}" class="filter">Users</a></li>
                                @endif
                                <li><a href="{{route('listRole')}}">Roles</a></li>
                                <li><a href="{{route('listEmployee')}}" class="filter">Employees</a></li>
                                <li><a href="{{route('listDesignation')}}">Desigantions</a></li>
                                <li><a href="{{route('listTickettype')}}">Ticket Types</a></li>
                                <li><a href="{{route('listCompanyDetail')}}">Companies</a></li>
                            </ul>
                        </li>
                    @endif

                    @if($current_work_log)
                    <li>
                        <a href="#!" class="bg-transparent" title="Task Punch Out">
                            <button type="button" class="btn-image" data-target="#work_log_modal" data-toggle="modal">
                                <img src="{{ URL::asset('public/img/content/taskcompleted_normal.svg') }}" alt="Punch Out" class="img-responsive">
                                <div class="btn-over-image">
                                    <img src="{{ URL::asset('public/img/content/taskcompleted_hover.svg') }}" alt="Punch Out" class="img-responsive">
                                </div>
                            </button>
                        </a>
                    </li>
                    @endif
                </ul>


                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown setting-menu">
                        <a data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <img class="img-responsive" alt="Menu" src="{{ URL::asset('public/img/content/menu-icon.png') }}">
                        </a>
                        <ul class="dropdown-menu">
                            @if(Entrust::can('To Dos'))
                            <li>
                                <a href="{{route('listToDo')}}" class="filter">To Dos</a>
                            </li>
                            @endif
                            <li><a href="#" data-toggle="modal" class="apply-leave"  data-target="#leave_modal">Apply Leave</a></li>
                            <li>
                                <a href="#" data-toggle="modal" class="current-status"  data-target="#current_status_modal">
                                    Update Current Status
                                    <p style="color:green;">{{$current_status}}</p>
                                </a>
                            </li>

                            <li><a href="{{url('/logout')}}">Task Request</a></li>
                        </ul>
                    </li>
                    <li class="dropdown profile">
                        <a data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <img class="img-responsive profile-pic" alt="TVS" src="{{ Auth::user()->profile_image_url }}">
                            <div class="login-info">
                                <span class="login-name">{{Auth::user()->name}}</span>
                                <?php
$user_role = Auth::user()->roles->pluck('name');
?>
                                <span class="login-roll">{{$user_role[0]}} </span>
                            </div>
                            <i class="ion-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('profile')}}" class="btn-file" >My Profile</a></li>
                            <li><a href="{{url('/logout')}}">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
            <!-- Mobile Menu -->
            <div class="custom-navbar-collapse-drop"></div>
            <div class="custom-navbar-collapse text-center" id="mobile-navbar-collapse-1">
                <div class="custom-navbar-collapse-block">
                    <div class="profile-block text-center">
                        <!--img class="img-responsive profile-pic" alt="TVS" src="{{ URL::asset('public/img/profile-thumb.jpg') }}"-->
                        <a href="{{route('profile')}}" class="">
                            <img class="img-responsive profile-pic" alt="TVS" src="{{ Auth::user()->profile_image_url }}">
                            <span class="login-name">{{Auth::user()->name}}</span>
                            <?php
$user_role = Auth::user()->roles->pluck('name');
?>
                            <span class="login-roll">{{$user_role[0]}}</span>
                        </a>
                    </div><!-- Profile -->
                    <ul class="nav navbar-nav">
                        @if(Entrust::can('projects'))
                        <li>
                            <a href="{{route('listProject')}}" class="filter">Projects</a>
                        </li>
                        @endif

                        @if(Entrust::can('tasks'))
                        <li class="dropdown tasks " id="task" >
                            <a href="#"    class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tasks <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <!-- change after new client list  -->
                                 @if(Auth::user()->portal_role_id==6 || Auth::user()->portal_role_id==7)
                                    <li><a href='{{route("listTask",["type"=>"pending"])}}'>Pending</a></li>
                                    <li><a href='{{route("listTask",["type" => "completed"])}}'>Completed</a></li>
                                @else
                                    <li><a href='{{route("listTask",["type"=>"pending"])}}'>Pending</a></li>
                                    <li><a href='{{route("listTask",["type" => "completed"])}}'>Completed</a></li>
                                @endif
                            </ul>
                        </li>
                        @endif

                        @if(Entrust::can('Team Tasks'))
                        <li class="dropdown tasks " id="task" >
                            <a href="#"    class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Tasks<i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href='{{route("taskListTM",["type"=>"pending"])}}'>Pending</a></li>
                                <li><a href='{{route("taskListTM",["type" => "completed"])}}'>Completed</a></li>
                            </ul>
                        </li>
                        @endif

                        @if(Entrust::can('Client Tasks'))
                        <li class="dropdown tasks " id="task" >
                            <a href="#"    class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tickets<i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href='{{route("taskListCLI",["type"=>"pending"])}}'>Pending</a></li>
                                <li><a href='{{route("taskListCLI",["type" => "completed"])}}'>Completed</a></li>
                            </ul>
                        </li>
                        @endif

                        <li>
                            <a href="{{route('listCalendar')}}" class="filter">Calendar</a>
                        </li>

                        @if(Entrust::can('Gallery'))
                        <li class="hide">
                            <a href="{{route('listCalendar')}}" class="filter">Gallery</a>
                        </li>
                        @endif

                        <li>
                            <a href="{{route('listCalendar')}}" class="filter">Assets</a>
                        </li>

                        @if(Entrust::can('HR'))
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">HR <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href='{{route("punchList")}}'>Punches</a></li>
                                <li><a href='{{route("breakList")}}'>Breaks</a></li>
                                <li><a href='{{route("leaveList")}}'>Leaves</a></li>
                                <li><a href='{{route("listEmployee")}}'>Employees</a></li>
                                <li><a href='#'>Interviews</a></li>
                                <li><a href='{{route("listWorkLogs")}}'>Work Logs</a></li>
                            </ul>
                        </li>
                        @endif

                        @if(Entrust::can('masters'))
                        <li class="dropdown masters " id="masters" >
                            <a href="#"    class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Masters <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu divider-menu">
                                @if(Entrust::can('users'))
                                    <li><a href="{{route('listUser')}}" class="filter">Users</a></li>
                                @endif
                                <li><a href="{{route('listRole')}}">Roles</a></li>
                                <li><a href="{{route('listEmployee')}}" class="filter">Employees</a></li>
                                <li><a href="{{route('listDesignation')}}">Desigantions</a></li>
                                <li><a href="{{route('listTickettype')}}">Ticket Types</a></li>
                                <li><a href="{{route('listCompanyDetail')}}">Companies</a></li>
                            </ul>
                        </li>
                        @endif
                        @if(Entrust::can('To Dos'))
                        <li>
                            <a href="{{route('listToDo')}}" class="filter">To Dos</a>
                        </li>
                        @endif
                        <li><a href="#" data-toggle="modal" class="apply-leave"  data-target="#leave_modal">Apply Leave</a></li>

                        <li>
                            <a href="#" data-toggle="modal" class="current-status"  data-target="#current_status_modal">
                                Update Current Status
                                <p style="color:green;">{{$current_status}}</p>
                            </a>
                        </li>
                        <li>
                            <a href="#!">
                                @if($current_work_log)
                                <button type="button" class="btn btn-primary" data-target="#work_log_modal" data-toggle="modal">
                                    Punch Out Task
                                </button>
                            @endif
                            </a>
                        </li>
                    </ul>
                </div><!-- Collapse Block -->
                <div class="bottom-fixed">
                    <a href="{{url('/logout')}}" class="btn btn-primary btn-rnd" role="button" aria-haspopup="true" aria-expanded="false">Logout</a>
                </div><!-- Bottom Fixed -->
            </div><!-- Mobile Navbar Collapse -->
        </div><!-- Container Fluid -->
    </nav>
</header><!-- Header -->
