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
                            <h4 class="card-title">Couple Form </h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="bdate">Booking Date <span class="text-danger">*</span></label>
                                    <input class="form-control" id="booking" name="bdate" type="date" >
                                    <span class="text-danger is-invalid name_err"></span>
                                </div>
                               
                                <div class="col-md-4">
                                    <label class="col-form-label" for="count">Couple Count</label>
                                    
                                    <select class="form-select" id="ccount" name="couplecount" placeholder="select technologies">
                                        <option selected>select Couple Count</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>

                            </div>

                              <!--------------------------------Add more Start----------------------------->
                              <div class="panel panel-footer mt-3 pt-3">
                                <table class="table  table-responsive table-bordered" id="dynamicAddRemove">
                                    <thead>
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Mobile</th>                                          
                                                <th>Gender</th>  
                                                <th>Adhar Card </th>
                                                <th style=""><a href="javascip:" class="btn btn-sm btn-success addMoreForm"><i class="fa fa-plus"></i> </a></th>
                                            </tr>
                                    </thead>
                                    <tbody id="addMore">
                                        <tr>
                                            <td>   
                                                <input type="text" name="fname[]" class="form-control" multiple="" id="fname">
                                            </td>
                                            <td>   
                                                <input type="text" name="lname[]" class="form-control" multiple="" id="lname">
                                            </td>   
                                            <td>   
                                            <input type="text" name="mobile[]" class="form-control" multiple="" id="mobile">
                                            </td>    
                                            <td>
                                                <select class="js-example-basic-single form-control" name="gender[]" id="gender" >
                                                    <option value="">Select Gender</option>                         
                                                        <option value="1" >Female</option>
                                                        <option value="2" >Male</option>      
                                                </select>  
                                            </td>    
                                            
                                            <td><input type="file" name="document[]" class="form-control" multiple="" id="document"></td>    
                                            <td style=""><a href="javascip:" class="btn btn-sm btn-danger removeAddMore"><i class="fa fa-remove"></i></a></td>
                                        <tr>
                                    </tbody>
                                </table>
                            </div><br>
                            <!-------------------------------- End -------------------------------------->

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" id="addSubmit">Submit</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin.layout>


{{-- Add --}}
<script>
   $(document).ready(function() {
    // Update the number of rows based on the couple count selection
    $('#ccount').on('change', function() {
        var coupleCount = $(this).val();
        if (coupleCount && coupleCount > 0) {
            // Clear the existing rows first
            $('#addMore').empty();
            // Add rows based on the selected couple count
            for (var i = 0; i < coupleCount * 2; i++) { // Multiply by 2 because each couple needs 2 rows
                addMoreForm();
            }
        }
    });

    // Function to add a new row to the form
    var rowId = 1;
    function addMoreForm() {
        var tr = '<tr id="row_' + rowId + '">' +
            '<td><input type="text" name="fname[]" class="form-control" required></td>' +
            '<td><input type="text" name="lname[]" class="form-control" required></td>' +
            '<td><input type="text" name="mobile[]" class="form-control" required></td>' +
            '<td><select class="js-example-basic-single form-control" name="gender[]" required>' +
            '<option value="">Select Gender</option>' +
            '<option value="1">Female</option>' +
            '<option value="2">Male</option>' +
            '</select></td>' +
            '<td><input type="file" name="document[]" class="form-control" required></td>' +
            '<td><a href="javascript:;" class="btn btn-sm btn-danger removeAddMore" data-rowid="' + rowId + '"><i class="fa fa-remove"></i></a></td>' +
            '</tr>';

        $('#addMore').append(tr);
        rowId++;
    }

    // Remove row functionality
    $(document).on('click', '.removeAddMore', function() {
        if ($(this).parents('table').find('.removeAddMore').length > 1) {
            $(this).parent().parent().remove();
        } else {
            alert("Cannot remove the last element.");
        }
    });

    // Validate on form submit
    $("#addForm").submit(function(e) {
        e.preventDefault();
        $("#addSubmit").prop('disabled', true);

        // Check if the required number of rows are filled
        var coupleCount = $('#ccount').val();
        var totalRows = $('#addMore tr').length;
        
        // Validate that the correct number of rows have been filled
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

    </script>