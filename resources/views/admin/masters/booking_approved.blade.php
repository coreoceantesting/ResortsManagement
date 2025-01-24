<x-admin.layout>
    <x-slot name="title"></x-slot>
    <x-slot name="heading"></x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}

    <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">Booking Approved Details</h4>
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
                                                        <th>Booking Id</th>
                                                        <th>Booking Date</th>
                                                        <th>Couple Count</th>
                                                        <th>Group Members</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($bookingrequest as $request)
                                                        <tr>
                                                            <td data-label="Booking Id">{{ $request->id }}</td>
                                                            <td data-label="Booking Date">{{ $request->booking_date }}</td>
                                                            <td data-label="Couple Count">{{ $request->couple_count }}</td>
                                                            <td data-label="Group Members">{{ $request->group_member }}</td>
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

    <script>
    feather.replace(); // This is necessary to render Feather icons
</script>