<x-admin.layout>
    <x-slot name="title">Couple Booking Rejected</x-slot>
    <x-slot name="heading">Couple Booking Rejected</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title"> Couple Booking Rejected Details</h4>
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
                                                            <!-- Displaying the first row for each group -->
                                                            @if($index == 0)
                                                                <td rowspan="{{ count($bookingrequest->couples) }}">{{ $count++ }}</td>
                                                                <td rowspan="{{ count($bookingrequest->couples) }}">{{ $bookingrequest->customername }}</td>
                                                                <td rowspan="{{ count($bookingrequest->couples) }}">
                                                                    {{ \Carbon\Carbon::parse($bookingrequest->booking_date)->format('d-m-Y') }}
                                                                </td>
                                                                <td rowspan="{{ count($bookingrequest->couples) }}">{{ $bookingrequest->couple_count }}</td>
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

                                                            <!-- Actions for the first row only -->
                                                            @if($index == 0)
                                                                <td rowspan="{{ count($bookingrequest->couples) }}">
                                                                   
                                                                      
                                                                       
                                                                            <a href="{{ route('booking.viewCouple', $bookingrequest->id) }}">
                                                                                <button type="button" class="btn text-info view-element px-2 py-1" title="View" data-id="{{ $bookingrequest->id }}" id="view-btn-{{ $bookingrequest->id }}">
                                                                                    <i data-feather="eye"></i> View
                                                                                </button>
                                                                            </a>
                                                                       
                                                                     
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


