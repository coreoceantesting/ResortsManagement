<x-admin.layout>
    <x-slot name="title">Group Booking Rejected</x-slot>
    <x-slot name="heading">Group Booking Rejected</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">Group Booking Rejected Details</h4>
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
                                                                                                                
                                                                                                                    
                                                                                                                        <a href="{{ route('booking.viewGroup', $bookingrequest->id) }}">
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


