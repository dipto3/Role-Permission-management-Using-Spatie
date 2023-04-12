

<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{url('/dashboard')}}"><img src="assets/images/icon/logo.png" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="active">
                        <a href="{{url('/dashboard')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>

                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Roles
                                Types
                            </span></a>
                        <ul class="collapse">
                            <li><a href="{{url('/roles-create')}}">Create Role</a></li>
                            <li><a href="{{url('/roles')}}">All Roles</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-pie-chart"></i><span>Users</span></a>
                        <ul class="collapse">
                            <li><a href="{{url('/user-create')}}">Create User</a></li>
                            <li><a href="{{url('/users')}}">All User</a></li>

                        </ul>
                    </li>



                </ul>
            </nav>
        </div>
    </div>
</div>
