<x-admin.layout>
    <x-slot name="title">Dashboard</x-slot>
    <x-slot name="heading">Dashboard</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}

    @push('styles')
        <style>
            .brd-right{
                border-right: 3px solid #ccc;
            }
            .bg-card-primary{
                background-color: #8c68cd;
            }

            @media only screen and (max-width: 768px) {
                .brd-right{
                    border-right: none;
                }
            }
        </style>
    @endpush

    <div class="container-fluid">
        <!-- resources/views/dashboard.blade.php -->
        <div class="row">

            <!-- Total People Visited Card -->
            <div class="col-md-4">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="fw-medium text-muted mb-0">Total People Visited</p>
                                <h2 class="mt-4 ff-secondary fw-semibold">
                                    <span class="counter-value" data-target="{{ $totalPeopleVisited }}">0</span>
                                </h2>
                            </div>
                            <div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-info-subtle rounded-circle fs-2">
                                        <i data-feather="users" class="text-info"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Female Entry Card -->
            <div class="col-md-4">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="fw-medium text-muted mb-0">Female Entry</p>
                                <h2 class="mt-4 ff-secondary fw-semibold">
                                    <span class="counter-value" data-target="{{ $femaleEntry }}">0</span>
                                </h2>
                            </div>
                            <div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-info-subtle rounded-circle fs-2">
                                        <i data-feather="users" class="text-info"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Male Entry Card -->
            <div class="col-md-4">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="fw-medium text-muted mb-0">Male Entry</p>
                                <h2 class="mt-4 ff-secondary fw-semibold">
                                    <span class="counter-value" data-target="{{ $maleEntry }}">0</span>
                                </h2>
                            </div>
                            <div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-info-subtle rounded-circle fs-2">
                                        <i data-feather="users" class="text-info"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="row">

            <!-- Approved Couple Card -->
            <div class="col-md-6 col-sm-12">
                <div class="card card-animate">
                    <div class="card-header bg-card-primary text-light">
                        <h3 class="card-title">Approved Couple</h3>
                    </div>
                    <div class="card-body">

                        <div class="row text-center">
                            <div class="col-xs-6 col-md-6 brd-right">
                                <h2 class="">{{ $approvedCouple }}</h2>
                                <p>Couple Count</p>
                            </div>
                            <div class="col-xs-6 col-md-6">
                                <h2 class="">{{ ($approvedCouple*2) }}</h2>
                                <p>People Count</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rejected Couple Card -->
            <div class="col-md-6 col-sm-12">
                <div class="card card-animate">
                    <div class="card-header bg-card-primary text-light">
                        <h3 class="card-title">Rejected Couple</h3>
                    </div>
                    <div class="card-body">

                        <div class="row text-center">
                            <div class="col-xs-6 col-md-6 brd-right">
                                <h2 class="">{{ $rejectedCouple }}</h2>
                                <p>Couple Count</p>
                            </div>
                            <div class="col-xs-6 col-md-6">
                                <h2 class="">{{ ($rejectedCouple*2) }}</h2>
                                <p>People Count</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>




        <div class="row">
            <!-- Approved Group Card -->
            <div class="col-md-6 col-sm-12">
                <div class="card card-animate">
                    <div class="card-header bg-card-primary text-light">
                        <h3 class="card-title">Approved Group</h3>
                    </div>
                    <div class="card-body">

                        <div class="row text-center">
                            <div class="col-xs-6 col-md-6 brd-right">
                                <h2 class="">{{ $approvedGroup }}</h2>
                                <p>Group Count</p>
                            </div>
                            <div class="col-xs-6 col-md-6">
                                <h2 class="">{{ $approvedGroupPeople }}</h2>
                                <p>People Count</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Rejected Group Card -->
            <div class="col-md-6 col-sm-12">
                <div class="card card-animate">
                    <div class="card-header bg-card-primary text-light">
                        <h3 class="card-title">Rejected Group</h3>
                    </div>
                    <div class="card-body">

                        <div class="row text-center">
                            <div class="col-xs-6 col-md-6 brd-right">
                                <h2 class="">{{ $rejectedGroup }}</h2>
                                <p>Group Count</p>
                            </div>
                            <div class="col-xs-6 col-md-6">
                                <h2 class="">{{ $rejectedGroupPeople }}</h2>
                                <p>People Count</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



    @push('scripts')
    @endpush

</x-admin.layout>
