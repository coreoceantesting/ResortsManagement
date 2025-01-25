
<x-admin.layout>
    <x-slot name="title"></x-slot>
    <x-slot name="heading"></x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data"  >
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title"> Couple Customer Details </h4>
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
                                                                                <th>First Name</th>
                                                                                <th>Last Name</th>
                                                                                <th>Mobile</th>
                                                                                <th>Gender</th>
                                                                                <th>Document</th>
                                                                    
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        @forelse ($customer as $request)
                                                                                <tr>
                                                                                <td data-label="First Name">{{ $request->firstname }}</td>
                                                                                <td data-label="Last Name">{{ $request->lastname }}</td>
                                                                                <td data-label="Mobile">{{ $request->mobile }}</td>
                                                                                <td data-label="Gender">{{ $request->Gender }}</td>
                                                                                <td>
                                                                                    <div class="col-sm-6">
                                                                                        <a href="{{ asset('storage/' . $request->document) }}" target="_blank">View</a>
                                                                                    </div>
                                                                                </td>
                                                                                    
                                                                                </tr>
                                                                            @empty
                                                                            <tr>
                                                                                <td colspan="5" class="text-center p-5">No data available</td>
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
