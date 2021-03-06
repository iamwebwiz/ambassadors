    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <i class="fa fa-circle text-success"></i> Online
                </div>
            </div>

            <!-- search form (Optional) -->
            {{-- <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form> --}}
            <!-- /.search form -->

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">ADMINISTRATION</li>
                <!-- Optionally, you can add icons to the links -->
                <li id="dashboard">
                    <a href="{{ route('admin.dash') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="treeview" id="users">
                    <a href="#"><i class="fa fa-users"></i> <span>Users</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li id="clients">
                            <a href="{{ url('administrator/users/clients') }}">
                                <i class="fa fa-briefcase"></i>
                                <span>Clients</span>
                            </a>
                        </li>
                        <li id="publishers">
                            <a href="{{ url('administrator/users/publishers') }}">
                                <i class="fa fa-user-secret"></i>
                                <span>Publishers</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li id="companies">
                    <a href="{{ url('administrator/companies') }}">
                        <i class="fa fa-building-o"></i>
                        <span>Companies</span>
                    </a>
                </li>

                <li id="advertRequests">
                    <a href="{{ url('administrator/advert-requests') }}">
                        <i class="fa fa-question"></i>
                        <span>Advert Requests</span>
                    </a>
                </li>

                <li id="tasks">
                    <a href="{{ route('admin.showAllTasks') }}">
                        <i class="fa fa-tasks"></i>
                        <span>Tasks</span>
                    </a>
                </li>
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
