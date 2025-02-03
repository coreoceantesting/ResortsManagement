<x-admin.layout>
    <x-slot name="title">Couple</x-slot>
    <x-slot name="heading">Couple</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->

 <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data" method="POST" >
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">Couple Form</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                            <div class="col-md-4">
                                    <label class="col-form-label" for="customername">Customer Name <span class="text-danger">*</span></label>
                                    <input class="form-control" id="cname" name="customername" type="text" min="" placeholder="Enter Customer Name">
                                    <span class="text-danger is-invalid name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="bdate">Booking Date <span class="text-danger">*</span></label>
                                    <input class="form-control" id="booking" name="bdate" type="date" min="">
                                    <span class="text-danger is-invalid bdate_err"></span>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-form-label" for="count">Couple Count</label>
                                    <select class="form-select" id="ccount" name="couplecount">
                                        <option selected>Select Couples Count</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="panel panel-footer mt-3 pt-3">
                                <table class="table table-responsive table-bordered" id="dynamicAddRemove">
                                    <thead>
                                        <tr >
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Mobile</th>
                                            <th>Gender</th>
                                            <th>Adhar Card </th>
                                        </tr>
                                    </thead>
                                    <tbody id="addMore">
                                        <tr>
                                            <td>
                                                <input type="text" name="fname[]" class="form-control" id="fname" placeholder="Enter First Name">
                                                @if ($errors->has('fname'))
                                                    <span class="text-danger">{{ $errors->first('fname') }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <input type="text" name="lname[]" class="form-control" id="lname" placeholder="Enter Last Name">
                                                @if ($errors->has('lname'))
                                                <span class="text-danger">{{ $errors->first('lname') }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <input type="text" name="mobile[]" class="form-control" id="mobile"  minlength="10" maxlength="10" placeholder="Enter Mobile">
                                                @if ($errors->has('mobile'))
                                                <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <select class="js-example-basic-single form-select" name="gender[]" id="gender">
                                                    <option value="">Select Gender</option>
                                                    <option value="1">Female</option>
                                                    <option value="2">Male</option>
                                                </select>
                                                @if ($errors->has('gender'))
                                                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <input type="file" name="document[]" class="form-control" id="document">
                                                @if ($errors->has('document'))
                                                    <span class="text-danger">{{ $errors->first('document') }}</span>
                                                @endif
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div><br>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mb-3" id="addSubmit">Submit</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</x-admin.layout>
<style>
        /* Hide columns on mobile */
        @media only screen and (max-width: 767px) {
            #dynamicAddRemove th, /* Adhar Card column */
            #dynamicAddRemove th {
                display: none;
            }
        }
    </style>
    <script src="{{ asset('js/app.js') }}"></script>
{{-- Add --}}
    <script>
            $(document).ready(function() {
                $('#ccount').on('change', function() {
                    var coupleCount = $(this).val();
                    if (coupleCount && coupleCount > 0) {
                        $('#addMore').empty();
                        for (var i = 0; i < coupleCount * 2; i++) {
                            addMoreForm();
                        }
                    }
                });

                var rowId = 1;
                function addMoreForm() {
                    var tr = '<tr id="row_' + rowId + '">' +
                        '<td><input type="text" name="fname[]" class="form-control" required placeholder="Enter First Name"></td>' +
                        '<td><input type="text" name="lname[]" class="form-control" placeholder="Enter Last Name" required></td>' +
                        '<td><input type="text" name="mobile[]" class="form-control"  minlength="10" maxlength="10" placeholder="Enter Mobile" required></td>' +
                        '<td><select class="js-example-basic-single form-control" name="gender[]" required >' +
                        '<option value="">Select Gender</option>' +
                        '<option value="1">Female</option>' +
                        '<option value="2">Male</option>' +
                        '</select></td>' +
                        '<td><input type="file" name="document[]" class="form-control" required></td>' +
                        '</tr>';

                    $('#addMore').append(tr);
                    rowId++;
                }


                $("#addForm").submit(function(e) {
                    e.preventDefault();
                    $("#addSubmit").prop('disabled', true);

                    var coupleCount = $('#ccount').val();
                    var totalRows = $('#addMore tr').length;

                    if (coupleCount * 2 !== totalRows) {
                        swal("Validation Error!", "Please fill in the required number of rows.", "error");
                        $("#addSubmit").prop('disabled', false);
                        return false;
                    }

                    var formData = new FormData(this);
                    $.ajax({
                        url: "{{ route('couple.store') }}",
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            $("#addSubmit").prop('disabled', false);
                            if (!data.error2) {
                                swal("Successful!", data.success, "success")
                                    .then((action) => {
                                        window.location.href = '{{ route("couple.index") }}';
                                    });
                            } else {
                                swal("Error!", data.error2, "error");
                            }
                        },
                        statusCode: {
                            422: function(responseObject, textStatus, jqXHR) {
                                $("#addSubmit").prop('disabled', false);
                                resetErrors();
                                printErrMsg(responseObject.responseJSON.errors);
                            },
                            500: function(responseObject, textStatus, errorThrown) {
                                $("#addSubmit").prop('disabled', false);
                                swal("Error occurred!", "Something went wrong, please try again.", "error");
                            }
                        }
                    });
                });
            });

            document.addEventListener("DOMContentLoaded", function() {
            const today = new Date();
            const year = today.getFullYear();
            const month = String(today.getMonth() + 1).padStart(2, '0');
            const day = String(today.getDate()).padStart(2, '0');
            const formattedDate = `${year}-${month}-${day}`;

            document.getElementById('booking').setAttribute('min', formattedDate);
            });
    </script>

         <script>
            $(document).ready(function() {
            $(".addMoreForm").click(function() {
                var newRow = $('#addMore tr:first').clone();
                newRow.find('input').val('');
                $('#addMore').append(newRow);
            });

                });
        </script>

</script>
    <script>
        $(document).ready(function() {
            $(document).ajaxStart(function() {

                $('#pageLoader').show(); // Show loader during Ajax request
            });

            $(document).ajaxStop(function() {
                $('#pageLoader').hide(); // Hide loader when the request finishes
            });
        });
    </script>
