
<x-admin.layout>
    <x-slot name="title"> Group View</x-slot>
    <x-slot name="heading">Group View</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h4 class="card-title">Booking Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="customername">Customer Name <span class="text-danger">*</span></label>
                                        <input class="form-control" id="cname" name="customername" type="text" value="{{ $booking->customername }}" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="bdate">Booking Date <span class="text-danger">*</span></label>
                                        <input class="form-control" id="booking" name="bdate" type="date" value="{{ $booking->booking_date }}" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="count">Group Member</label>
                                        <input class="form-control" name="group_member" value="{{ $booking->group_member }}" readonly>
                                    </div>
                                </div>

                                <div class="panel panel-footer pt-3 mt-3">
                                    <table class="table table-responsive table-bordered" id="dynamicAddRemove">
                                        <thead>
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Mobile</th>                                          
                                                <th>Gender</th>  
                                                <th>Adhar Card</th>
                                            </tr>
                                        </thead>
                                        <tbody id="addMore">
                                            @foreach ($booking->groups as $member) <!-- Assuming relationship defined -->
                                            <tr>
                                                <td><input type="text" name="fname[]" class="form-control" value="{{ $member->firstname }}" readonly></td>
                                                <td><input type="text" name="lname[]" class="form-control" value="{{ $member->lastname }}" readonly></td>
                                                <td><input type="text" name="mobile[]" class="form-control" value="{{ $member->mobile }}" readonly></td>
                                                
                                                <td> <select class="form-select" name="gender[]" disabled>
                                                    <option value="1" {{ $member->gender == 1 ? 'selected' : '' }}>Female</option>
                                                    <option value="2" {{ $member->gender == 2 ? 'selected' : '' }}>Male</option>
                                                </select></td>
                                                <td>@if ($member->document) 
                                                    <a href="{{ asset('storage/' . $member->document) }}" target="_blank">View Document</a>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </x-admin.layout>

    <style>
    input[readonly], select[disabled] {
    background-color: #f5f5f5;
    cursor: not-allowed;
    }
    </style>

    <script>
        document.getElementById('backButton').addEventListener('click', function() {
            window.history.back();
        });
    </script>
