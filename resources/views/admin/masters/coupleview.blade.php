<x-admin.layout>
    <x-slot name="title"></x-slot>
    <x-slot name="heading"></x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}

    @push('styles')
        <style>
            .btn-width {
                width: 25%;
            }

            @media only screen and (max-width: 768px) {
                .btn-width {
                    width: 50%;
                }
            }
        </style>
    @endpush


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">

                        <form class="theme-form" name="viewForm" id="viewForm" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="card-header">
                                <h4 class="card-title">Couple Form for Booking Id {{ $booking->id }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="customername">Customer Name <span class="text-danger">*</span></label>
                                        <input class="form-control" id="cname" name="customername" type="text" value="{{ $booking->customername }}" readonly>
                                        <span class="text-danger is-invalid name_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="bdate">Booking Date <span class="text-danger">*</span></label>
                                        <input class="form-control" id="booking" name="bdate" type="date" value="{{ $booking->booking_date }}" readonly>
                                        <span class="text-danger is-invalid name_err"></span>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="col-form-label" for="ccount">Couple Count</label>
                                        <select class="form-select" id="ccount" name="couplecount">
                                            <option value="1" {{ $booking->couple_count == 1 ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ $booking->couple_count == 2 ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ $booking->couple_count == 3 ? 'selected' : '' }}>3</option>
                                            <option value="4" {{ $booking->couple_count == 4 ? 'selected' : '' }}>4</option>
                                            <option value="5" {{ $booking->couple_count == 5 ? 'selected' : '' }}>5</option>
                                        </select>
                                        <p id="selectedCount">Selected Couple Count: {{ $booking->couplecount }}</p>
                                    </div>
                                </div>

                                <div class="panel panel-footer mt-3 pt-3">
                                    <table class="table table-responsive table-bordered" id="dynamicAddRemove">
                                        <thead>
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Mobile</th>
                                                <th>Gender</th>
                                                <th>Adhar Card </th>
                                            </tr>
                                        </thead>
                                        <tbody id="addMore">
                                            @foreach ($booking->couples as $couple)
                                                <tr>
                                                    <td>
                                                        <input type="text" name="fname[]" class="form-control" value="{{ $couple->firstname }}" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="lname[]" class="form-control" value="{{ $couple->lastname }}" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="mobile[]" class="form-control" value="{{ $couple->mobile }}" readonly>
                                                    </td>
                                                    <td>
                                                        <select class="form-select" name="gender[]" disabled>
                                                            <option value="1" {{ $couple->gender == 1 ? 'selected' : '' }}>Female</option>
                                                            <option value="2" {{ $couple->gender == 2 ? 'selected' : '' }}>Male</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        @if ($couple->document)
                                                            <a href="{{ asset('storage/' . $couple->document) }}" target="_blank">View Document</a>
                                                        @else
                                                            <span>No document uploaded</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div><br>

                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-secondary" id="backButton">Back</button>
                                    </div>
                                    @if($booking->status == 0)
                                        <div class="col-md-6">
                                            <button class="edit-element btn text-success px-2 py-1 float-end btn-width approve-btn" title="Approve" data-id="{{ $booking->id }}">
                                                <div class="d-flex flex-column align-items-center">
                                                    <i data-feather="check-circle"></i>
                                                    <span>Approve</span>
                                                </div>
                                            </button>
                                            <button class="btn text-danger rem-element px-2 py-1 float-end btn-width reject-btn" title="Reject" data-id="{{ $booking->id }}">
                                                <div class="d-flex flex-column align-items-center">
                                                    <i data-feather="x-circle"></i>
                                                    <span>Reject</span>
                                                </div>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-admin.layout>

<style>
    input[readonly],
    select[disabled] {
        background-color: #f5f5f5;
        cursor: not-allowed;
    }
</style>
<script>
    // Initial setup to display the current value
    document.addEventListener('DOMContentLoaded', function() {
        const selectedValue = document.getElementById('ccount').value;
        document.getElementById('selectedCount').textContent = 'Selected Couple Count: ' + selectedValue;
    });

    // Update the selected value dynamically when the dropdown value changes
    document.getElementById('ccount').addEventListener('change', function() {
        var selectedValue = this.value;
        document.getElementById('selectedCount').textContent = 'Selected Couple Count: ' + selectedValue;
    });
</script>
<script>
    document.getElementById('backButton').addEventListener('click', function() {
        window.history.back();
    });

    $(document).ready(function(){

        $('.approve-btn').click(function(e) {
            e.preventDefault();
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
        $('.reject-btn').click(function(e) {
            e.preventDefault();
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
