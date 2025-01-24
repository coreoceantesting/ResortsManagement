<x-admin.layout>
    <x-slot name="title">Groups</x-slot>
    <x-slot name="heading">Groups</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                   
                </div>
            </div>
        </div>


        <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">Groups Form </h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="bdate">Booking Date <span class="text-danger">*</span></label>
                                    <input class="form-control" id="booking" name="bdate" type="date" min="">
                                    <span class="text-danger is-invalid name_err"></span>
                                </div>
                               
                                <div class="col-md-4">
                                    <label class="col-form-label" for="count">Group Members</label>
                                    <select class="form-select" id="groupmem" name="group_member" >
                                        <option selected>select group Members</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>

<!-------------------------------- Add More Start ---------------------------->
                    <div class="panel panel-footer pt-3 mt-3">
                        <table class="table table-responsive table-bordered" id="dynamicAddRemove">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Mobile</th>                                          
                                    <th>Gender</th>  
                                    <th>Adhar Card</th>
                                    <th style="">
                                        <!-- Initially hidden add more button -->
                                        <a href="javascript:" class="btn btn-sm btn-success addMoreForm" style="display:none;">
                                            <i class="fa fa-plus"></i> 
                                        </a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="addMore">
                                <tr>
                                    <td><input type="text" name="fname[]" class="form-control" multiple="" id="fname" placeholder=" Enter First Name"></td>
                                    <td><input type="text" name="lname[]" class="form-control" multiple="" id="lname" placeholder=" Enter Last Name"></td>
                                    <td><input type="text" name="mobile[]" class="form-control" multiple="" id="mobile" placeholder=" Enter Mobile"></td>
                                    <td>
                                        <select class="js-example-basic-single form-control" name="gender[]" id="gender">
                                            <option value="">Select Gender</option>                         
                                            <option value="1">Female</option>
                                            <option value="2">Male</option>      
                                        </select>
                                    </td>
                                    <td><input type="file" name="document[]" class="form-control" multiple="" id="document"></td>
                                    <td><a href="javascript:" class="btn btn-sm btn-danger removeAddMore"><i class="fa fa-remove"></i></a></td>
                                </tr>

                                    <tr>
                                        <td><input type="text" name="fname[]" class="form-control" multiple="" id="fname" placeholder=" Enter First Name"></td>
                                        <td><input type="text" name="lname[]" class="form-control" multiple="" id="lname" placeholder=" Enter Last Name"></td>
                                        <td><input type="text" name="mobile[]" class="form-control" multiple="" id="mobile" placeholder=" Enter Mobile"></td>
                                        <td>
                                            <select class="js-example-basic-single form-control" name="gender[]">
                                                <option value="">Select Gender</option>                         
                                                <option value="1">Female</option>
                                                <option value="2">Male</option>      
                                            </select>
                                        </td>
                                        <td><input type="file" name="document[]" class="form-control" multiple="" id="document"></td>
                                        <td><a href="javascript:" class="btn btn-sm btn-danger removeAddMore"><i class="fa fa-remove"></i></a></td>
                                    </tr>
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
    $("#addForm").submit(function(e) {
        e.preventDefault();
        $("#addSubmit").prop('disabled', true);

        var formdata = new FormData(this);
        $.ajax({
            url: "{{ route('group.store') }}",
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data)
            {
                $("#addSubmit").prop('disabled', false);
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                        .then((action) => {
                            window.location.href = '{{ route("group.index") }}';
                        });
                else
                    swal("Error!", data.error2, "error");
            },
            statusCode: {
                422: function(responseObject, textStatus, jqXHR) {
                    $("#addSubmit").prop('disabled', false);
                    resetErrors();
                    printErrMsg(responseObject.responseJSON.errors);
                },
                500: function(responseObject, textStatus, errorThrown) {
                    $("#addSubmit").prop('disabled', false);
                    swal("Error occured!", "Something went wrong please try again", "error");
                }
            }
        });

    });
</script>

{{-- Add More Form --}}
    <script>
        $('.addMoreForm').on('click',function(){
            addMoreForm();
        });

        var rowId = 1; 
        function addMoreForm() {
            var tr = '<tr id="row_' + rowId + '">' +
                '<td><input type="text" name="fname[]" class="form-control" multiple=""></td>' +
                '<td><input type="text" name="lname[]" class="form-control" multiple=""></td>' +
                '<td><input type="text" name="mobile[]" class="form-control" multiple=""></td>' +
                '<td> <select class="js-example-basic-single form-control" name="gender[]" id="gender" ><option value="">--Select Gender--</option><option value="1" name="gender[' + rowId + ']">Female</option><option value="2" name="gender[' + rowId + ']">Male</option> </select>  </td>' +
                '<td><input type="file" name="document[]" class="form-control" multiple=""></td>' +
                '<td><a href="javascrip:" class="btn btn-sm btn-danger removeAddMore" data-rowid="' + rowId + '"><i class="fa fa-remove"></i></a></td>' +
                '<tr>';

            $('#addMore').append(tr); 
            $('#gender' + rowId).select2();  
            rowId++;
        }
        

        $(document).on('click', '.removeAddMore', function () {
            if ($(this).parents('table').find('.removeAddMore').length > 1) {
                $(this).parent().parent().remove();
            } else {
                alert("Cannot remove the last element.");
            }        
        });
    </script>

<script>
    // On Change of Group Members Dropdown
$('#groupmem').on('change', function() {
    var selectedCount = $(this).val(); 

    if (selectedCount > 2) {
        $('.addMoreForm').show();
    } else {
        $('.addMoreForm').hide(); 
    }
});

$(document).ready(function() {
    var selectedCount = $('#groupmem').val();
    if (selectedCount > 2) {
        $('.addMoreForm').show(); 
    } else {
        $('.addMoreForm').hide();
    }
});

  // Set the min attribute of the input field to today's date in YYYY-MM-DD format
  document.addEventListener("DOMContentLoaded", function() {
        const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0'); 
        const day = String(today.getDate()).padStart(2, '0'); 
        const formattedDate = `${year}-${month}-${day}`;
        
        document.getElementById('booking').setAttribute('min', formattedDate);
    });
</script>