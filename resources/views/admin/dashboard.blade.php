<x-admin.layout>
    <x-slot name="title">Dashboard</x-slot>
    <x-slot name="heading">Dashboard</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}

    <!-- resources/views/dashboard.blade.php -->
<div class="row">
    <!-- Approved Couple Card -->
    <div class="col-md-6">
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <p class="fw-medium text-muted mb-0">Approved Couple</p>
                        <h2 class="mt-4 ff-secondary fw-semibold">
                            <span class="counter-value" data-target="{{ $approvedCouple }}">0</span>
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

    <!-- Rejected Couple Card -->
    <div class="col-md-6">
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <p class="fw-medium text-muted mb-0">Rejected Couple</p>
                        <h2 class="mt-4 ff-secondary fw-semibold">
                            <span class="counter-value" data-target="{{ $rejectedCouple }}">0</span>
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

    <!-- Approved Group Card -->
    <div class="col-md-6">
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <p class="fw-medium text-muted mb-0">Approved Group</p>
                        <h2 class="mt-4 ff-secondary fw-semibold">
                            <span class="counter-value" data-target="{{ $approvedGroup }}">0</span>
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

    <!-- Rejected Group Card -->
    <div class="col-md-6">
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <p class="fw-medium text-muted mb-0">Rejected Group</p>
                        <h2 class="mt-4 ff-secondary fw-semibold">
                            <span class="counter-value" data-target="{{ $rejectedGroup }}">0</span>
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

    <!-- Total People Visited Card -->
    <div class="col-md-6">
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

    <!-- Male Entry Card -->
    <div class="col-md-6">
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

    <!-- Female Entry Card -->
    <div class="col-md-6">
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
</div>




    @push('scripts')
    @endpush

</x-admin.layout>
