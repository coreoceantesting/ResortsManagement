<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('admin/images/logo-sm.png') }}" alt="" height="22" />
            </span>
            <span class="logo-lg">
                <img src="{{ asset('admin/images/logo-dark.png') }}" alt="" height="17" />
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('admin/images/logo-sm.png') }}" alt="" height="22" />
            </span>
            <span class="logo-lg">
                <img src="{{ asset('admin/images/logo-light.png') }}" alt="" height="17" width="100%" />
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
 
                @if(!Route::is('couple.index') && !Route::is('group.index') && !Route::is('couple.show') && !Route::is('group.show'))
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('dashboard')}}" >
                        <i class="ri-dashboard-2-line"></i>
                        <span data-key="t-dashboards">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                            <i class="ri-layout-3-line"></i>
                            <span data-key="t-layouts">Couple Entry</span>
                        </a>
                 
                    <div class="collapse menu-dropdown" id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('dashboardCouple')}}" class="nav-link" data-key="t-horizontal">Booking</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('coupleApproved_dashboard')}}" class="nav-link" data-key="t-horizontal">Approved</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('coupleRejected_dashboard')}}" class="nav-link" data-key="t-horizontal">Rejected</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                            <i class="ri-layout-3-line"></i>
                            <span data-key="t-layouts">Group Entry</span>
                        </a>
                   
                    <div class="collapse menu-dropdown" id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('dashboardGroup')}}" class="nav-link" data-key="t-horizontal">Booking</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('groupApproved_dashboard')}}" class="nav-link" data-key="t-horizontal">Approved</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('groupRejected_dashboard')}}" class="nav-link" data-key="t-horizontal">Rejected</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                            <i class="ri-layout-3-line"></i>
                            <span data-key="t-layouts">Report</span>
                        </a>
                   
                    <div class="collapse menu-dropdown" id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                            <a href="" class="nav-link" data-key="t-horizontal">Couple Entry Report</a>
                            </li>
                            <li class="nav-item">
                            <a href="" class="nav-link" data-key="t-horizontal">Group Entry Report</a>
                            </li>
                           
                        </ul>
                    </div>
                </li>
            @endif
                @canany(['users.view', 'roles.view'])
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="bx bx-user-circle"></i>
                        <span data-key="t-layouts">User Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">
                            @can('users.view')
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}" class="nav-link" data-key="t-horizontal">Users</a>
                                </li>
                            @endcan
                            @can('roles.view')
                                <li class="nav-item">
                                    <a href="{{ route('roles.index') }}" class="nav-link" data-key="t-horizontal">Roles</a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
                @endcan

            </ul>
        </div>
    </div>

    <div class="sidebar-background"></div>
</div>


<div class="vertical-overlay"></div>
