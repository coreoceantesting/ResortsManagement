<x-admin.layout>
        <x-slot name="title">Group Booking</x-slot>
        <x-slot name="heading">Group Booking</x-slot>
        {{-- <x-slot name="subheading">Test</x-slot> --}}

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data"  >
                            @csrf
                            <div class="card-header">
                                <h4 class="card-title"> Group Booking Details </h4>
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
                                                        <th>No Of Group Members</th>
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
                                                            @foreach($bookingrequest->groups as $index => $group)
                                                                <tr>
                                                                    <!-- Displaying the first row for each group -->
                                                                    @if($index == 0)
                                                                        <td rowspan="{{ count($bookingrequest->groups) }}">{{ $count++ }}</td>
                                                                        <td rowspan="{{ count($bookingrequest->groups) }}">{{ $bookingrequest->customername }}</td>
                                                                        <td rowspan="{{ count($bookingrequest->groups) }}">
                                                                            {{ \Carbon\Carbon::parse($bookingrequest->booking_date)->format('d-m-Y') }}
                                                                        </td>
                                                                        <td rowspan="{{ count($bookingrequest->groups) }}">{{ $bookingrequest->group_member }}</td>
                                                                    @endif
                                                                    <td>{{ $group->firstname }}</td>
                                                                    <td>{{ $group->lastname }}</td>
                                                                    <td>{{ $group->mobile }}</td>
                                                                    <td>
                                                                        @if($group->gender == 1)
                                                                            Female
                                                                        @elseif($group->gender == 2)
                                                                            Male
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <a href="{{ asset('storage/'.$group->document) }}" target="_blank">view</a>
                                                                    </td>

                                                                    <!-- Actions for the first row only -->
                                                                    @if($index == 0)
                                                                     <td rowspan="{{ count($bookingrequest->groups) }}">
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
                                                                            <a href="{{ route('booking.viewGroup', $bookingrequest->id) }}">
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
                url: '/group/approve/' + bookingId,
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', 
                },
                success: function(response) {
                    alert(response.message); 
                    // Refresh the page or reload data without reloading the page
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
                url: '/group/reject/' + bookingId,
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', 
                },
                success: function(response) {
                    alert(response.message); 
                    // Refresh the page or reload data without reloading the page
                    location.reload();
                },
                error: function() {
                    alert('There was an error while rejecting the booking.');
                }
            });
        });
    });
</script>
