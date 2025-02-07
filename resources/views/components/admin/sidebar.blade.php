<div class="app-menu navbar-menu">
    <!-- LOGO -->

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
                        <span data-key="t-layouts">Masters</span>
                    </a>

                <div class="collapse menu-dropdown" id="sidebarLayouts">
                    <ul class="nav nav-sm flex-column">
                        {{-- <li class="nav-item">
                            <a href="{{route('farmhouse')}}" class="nav-link" data-key="t-horizontal">Farmhouse</a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a href="{{route('couple')}}" class="nav-link" data-key="t-horizontal">Couple</a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('farmhouse.index') }}" class="nav-link {{ request()->routeIs('farmhouse.index') ? 'active' : '' }}" data-key="t-horizontal">Farmhouse</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{route('Group')}}" class="nav-link" data-key="t-horizontal">Group</a>
                        </li> --}}
                    </ul>
                </div>
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
                            <a href="#" class="nav-link" data-key="t-horizontal">Couple Entry Report</a>
                            </li>
                            <li class="nav-item">
                            <a href="#" class="nav-link" data-key="t-horizontal">Group Entry Report</a>
                            </li>

                        </ul>
                    </div>
                </li>
            @endif
            </ul>
        </div>
    </div>

    <div class="sidebar-background"></div>
</div>


<div class="vertical-overlay"></div>

<style>

</style>
