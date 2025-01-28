
<x-admin.layout>
    <x-slot name="title"></x-slot>
    <x-slot name="heading"></x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


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
                                    <label class="col-form-label" for="count">Couple Count</label>
                                    <select class="form-select" id="ccount" name="couplecount" disabled>
                                        <option value="1" {{ $booking->couplecount == 1 ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ $booking->couplecount == 2 ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ $booking->couplecount == 3 ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ $booking->couplecount == 4 ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ $booking->couplecount == 5 ? 'selected' : '' }}>5</option>
                                    </select>
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
                                                <td>@if ($couple->document) 
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
                            <button type="button" class="btn btn-secondary" id="backButton">Back</button>
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
