    <x-admin.layout>
        <x-slot name="title">Couple Booking</x-slot>
        <x-slot name="heading">Couple Booking</x-slot>
        {{-- <x-slot name="subheading">Test</x-slot> --}}

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data"  >
                            @csrf
                            <div class="card-header">
                                <h4 class="card-title"> Couple Booking Details </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                            <div class="table-responsive">
                                            <table id="buttons-datatables" class="table table-bordered align-middle">
                                            <thead>
                                                <tr>
                                                    <th>Sr No</th>
                                                    <th>Customer Name</th>
                                                    <th>Booking Date</th>
                                                    <th>Couple Count</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Mobile</th>
                                                    <th>Gender</th>
                                                    <th>Document</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $count = 1; @endphp
                                                @forelse ($bookingrequests as $bookingrequest)
                                                    @foreach($bookingrequest->couples as $index => $couple)
                                                        <tr>
                                                            <!-- Only display once for the first couple -->
                                                            @if($index == 0)
                                                                <td rowspan="{{ $bookingrequest->couples->count() }}">{{ $count++ }}</td>
                                                                <td rowspan="{{ $bookingrequest->couples->count() }}">{{ $bookingrequest->customername }}</td>
                                                                <td rowspan="{{ $bookingrequest->couples->count() }}">
                                                                    {{ \Carbon\Carbon::parse($bookingrequest->booking_date)->format('d-m-Y') }}
                                                                </td>
                                                                <td rowspan="{{ $bookingrequest->couples->count() }}">{{ $bookingrequest->couple_count }}</td>
                                                            @endif
                                                            <td>{{ $couple->firstname }}</td>
                                                            <td>{{ $couple->lastname }}</td>
                                                            <td>{{ $couple->mobile }}</td>
                                                            <td>
                                                                @if($couple->gender == 1)
                                                                    Female
                                                                @elseif($couple->gender == 2)
                                                                    Male
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="{{ asset('storage/'.$couple->document) }}" target="_blank">view</a>
                                                            </td>
                                                            
                                                            <!-- Actions for the first couple only -->
                                                            @if($index == 0)
                                                                <td rowspan="{{ $bookingrequest->couples->count() }}">
                                                                
                                                                        <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <button class="edit-element btn text-success px-2 py-1" title="Approve" data-id="{{ $bookingrequest->id }}" id="approve-btn-{{ $bookingrequest->id }}">
                                                                                <div class="d-flex flex-column align-items-center">
                                                                                    <i data-feather="check-circle"></i>
                                                                                    <span>Approve</span>
                                                                                </div>
                                                                            </button>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <button class="btn text-danger rem-element px-2 py-1" title="Reject" data-id="{{ $bookingrequest->id }}" id="reject-btn-{{ $bookingrequest->id }}">
                                                                                <div class="d-flex flex-column align-items-center">
                                                                                    <i data-feather="x-circle"></i>
                                                                                    <span>Reject</span>
                                                                                </div>
                                                                            </button>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <a href="{{ route('booking.viewCouple', $bookingrequest->id) }}">
                                                                                <button type="button" class="btn text-info view-element px-2 py-1" title="View" data-id="{{ $bookingrequest->id }}" id="view-btn-{{ $bookingrequest->id }}">
                                                                                    <div class="d-flex flex-column align-items-center">
                                                                                        <i data-feather="eye"></i>
                                                                                        <span>View</span>
                                                                                    </div>
                                                                                </button>
                                                                            </a>
                                                                        </div>
                                                                        </div>
                                                                </td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                @empty
                                                    <tr>
                                                        <td colspan="10" class="text-center p-5">No data available</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>



                                            </table>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </x-admin.layout>

    <script>
    feather.replace(); // This is necessary to render Feather icons
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script>
    $(document).ready(function() {
    // Approve booking
    $('button[id^="approve-btn-"]').click(function() {
        var bookingId = $(this).data('id');

        $.ajax({
            url: '/couple/approve/' + bookingId,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}', 
            },
            success: function(response) {
                alert(response.message); 
                location.reload(); 
            },
            error: function() {
                alert('There was an error while approving the booking.');
            }
        });
    });

    // Reject booking
    $('button[id^="reject-btn-"]').click(function() {
        var bookingId = $(this).data('id');

        $.ajax({
            url: '/couple/reject/' + bookingId,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}', 
            },
            success: function(response) {
                alert(response.message); 
                location.reload(); 
            },
            error: function() {
                alert('There was an error while rejecting the booking.');
            }
        });
    });
});
</script>

<style>

    /* General Table Styles */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        background-color: #f4f4f4;
    }

    /* Hide table headers on mobile */
    @media (max-width: 768px) {
        thead {
            display: none; /* Hide headers */
        }

        tbody tr {
            display: block;
            margin-bottom: 10px;
            border: 1px solid #ddd; /* Optional: to add border to each row */
        }

        tbody tr td {
            display: block;
            text-align: left;
            position: relative;
            padding-left: 50%;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        /* Add labels before data for mobile view */
        tbody tr td::before {
            content: attr(data-label);
            position: absolute;
            left: 10px;
            top: 10px;
            font-weight: bold;
            text-transform: uppercase;
        }

        /* Adjust the action buttons */
        .row {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        /* Modify action button alignment for mobile */
        .row .col-sm-4 {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .btn {
            width: 100%; /* Full width for mobile buttons */
            text-align: center;
        }
    }
    
    /* Optional: Small adjustments for table rows on small screens */
    tbody tr td {
        padding-left: 0;
        padding-right: 0;
    }

</style>