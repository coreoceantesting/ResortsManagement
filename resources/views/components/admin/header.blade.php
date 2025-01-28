<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            
            @if(!Route::is('couple.index') && !Route::is('group.index') && !Route::is('couple.show') && !Route::is('group.show'))
            <div class="d-flex align-items-center">
               
                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user"
                                src="{{ asset('admin/images/users/avatar-1.jpg') }}" alt="Header Avatar" />
                            <span class="text-start ms-xl-2">
                                <!-- <span
                                    class="d-none d-xl-inline-block ms-1 fw-semibold user-name-text">Admin</span> -->
                                <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text"></span>
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- <h6 class="dropdown-header">
                            Welcome Admin!
                        </h6> -->
                       
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
                                <span class="align-middle" data-key="t-logout">Logout</span>
                            </a>
                       
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
              
            </div>
            @endif
        </div>
    </div>
</header>



@push('scripts')
<script>
$(document).ready(function() {

    $("#change-theme-button").click(function(e) {
        e.preventDefault();

        $.ajax({
            url: "{{ route('change-theme-mode') }}",
            type: 'GET',
            data: {
                '_token': "{{ csrf_token() }}",
            },
            success: function(data, textStatus, jqXHR) {
                console.log("theme color changed");
            },
            error: function(error, jqXHR, textStatus, errorThrown) {
                console.log("something whent wrong while changing theme color");
            },
        });

    });

});
</script>
@endpush