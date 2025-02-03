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
                                    <label class="col-form-label" for="customername">Customer Name <span class="text-danger">*</span></label>
                                    <input class="form-control" id="cname" name="customername" type="text" min="" placeholder="Enter Customer Name">
                                    <span class="text-danger is-invalid name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="bdate">Booking Date <span class="text-danger">*</span></label>
                                    <input class="form-control" id="booking" name="bdate" type="date" min="{{ now()->toDateString() }}" value="{{ now()->toDateString() }}" onfocus="this.showPicker()" placeholder="dd-mm-yy">
                                    <span class="text-danger is-invalid bdate_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="count">Group Member</label>
                                    <select class="form-select" id="groupmem" name="group_member">
                                        <option selected>Select No Of Group Members</option>
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
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                        <option value="32">32</option>
                                        <option value="33">33</option>
                                        <option value="34">34</option>
                                        <option value="35">35</option>
                                        <option value="36">36</option>
                                        <option value="37">37</option>
                                        <option value="38">38</option>
                                        <option value="39">39</option>
                                        <option value="40">40</option>
                                        <option value="41">41</option>
                                        <option value="42">42</option>
                                        <option value="43">43</option>
                                        <option value="44">44</option>
                                        <option value="45">45</option>
                                        <option value="46">46</option>
                                        <option value="47">47</option>
                                        <option value="48">48</option>
                                        <option value="49">49</option>
                                        <option value="50">50</option>
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
                                    <th>Aadhaar Card</th>
                                </tr>
                            </thead>
                            <tbody id="addMore">
                                <tr>
                                    <td><input type="text" name="fname[]" class="form-control" multiple="" id="fname" placeholder=" Enter First Name"></td>
                                    <td><input type="text" name="lname[]" class="form-control" multiple="" id="lname" placeholder=" Enter Last Name"></td>
                                    <td><input type="text" name="mobile[]" class="form-control" multiple="" id="mobile" placeholder=" Enter Mobile"  minlength="10" maxlength="10"></td>
                                    <td>
                                        <select class="js-example-basic-single form-control" name="gender[]" id="gender">
                                            <option value="">Select Gender</option>
                                            <option value="1">Female</option>
                                            <option value="2">Male</option>
                                        </select>
                                    </td>
                                    <td><input type="file" name="document[]" class="form-control" multiple="" id="document"></td>
                                </tr>

                                    <tr>
                                        <td><input type="text" name="fname[]" class="form-control" multiple="" id="fname" placeholder=" Enter First Name"></td>
                                        <td><input type="text" name="lname[]" class="form-control" multiple="" id="lname" placeholder=" Enter Last Name"></td>
                                        <td><input type="text" name="mobile[]" class="form-control" multiple="" id="mobile" placeholder=" Enter Mobile"  minlength="10" maxlength="10"></td>
                                        <td>
                                            <select class="js-example-basic-single form-control" name="gender[]">
                                                <option value="">Select Gender</option>
                                                <option value="1">Female</option>
                                                <option value="2">Male</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="file" name="document[]" class="form-control" multiple="" id="document">
                                            <span class="text-danger is-invalid name_err"></span>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                     </div><br>
                            <!-------------------------------- End -------------------------------------->

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mb-3 mb-md-0" id="addSubmit">Submit</button>
                            <button type="reset" class="btn btn-warning mb-3">Reset</button>
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

    <style>
        /* Hide columns on mobile */
        @media only screen and (max-width: 767px) {
            #dynamicAddRemove th,
            #dynamicAddRemove th {
                display: none;
            }
        }
    </style>

{{-- Add More Form --}}
    <script>
        $(document).ready(function()
        {
            $('#groupmem').on('change', function()
            {

                var group_member = $(this).val();
                if (group_member && group_member > 0)
                {
                    $('#addMore').empty();
                    for (var i = 0; i < group_member * 1; i++) {
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
                    '<td><input type="file" name="document[]" class="form-control" ></td>' +

                    '</tr>';

                $('#addMore').append(tr);
                rowId++;
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

            $('#groupmem').on('change', function() {
                var selectedMembers = $(this).val();
                var currentRows = $('#addMore tr').length;

                if (selectedMembers < currentRows) {
                    $('#addMore tr:gt(' + (selectedMembers - 1) + ')').remove();
                }
                if (selectedMembers > currentRows) {
                    var rowsToAdd = selectedMembers - currentRows;
                    for (var i = 0; i < rowsToAdd; i++) {
                        var newRow = $('#addMore tr:first').clone();
                        newRow.find('input').val('');
                        newRow.find('select').val('');
                        newRow.appendTo('#addMore');
                    }
                }
            });


        });
    </script>

    <script>
            $(document).ready(function() {
            $('#groupmem').on('change', function() {
                var selectedMembers = $(this).val();
                var currentRows = $('#addMore tr').length;

                if (selectedMembers < currentRows) {
                    $('#addMore tr:gt(' + (selectedMembers - 1) + ')').remove();
                }
                if (selectedMembers > currentRows) {
                    var rowsToAdd = selectedMembers - currentRows;
                    for (var i = 0; i < rowsToAdd; i++) {
                        var newRow = $('#addMore tr:first').clone();
                        newRow.find('input').val('');
                        newRow.find('select').val('');
                        newRow.appendTo('#addMore');
                    }
                }
            });

            // Limit the number of rows to 2
            var maxRows = 2;
            $(document).on('click', '.addMoreForm', function() {
                if ($('#addMore tr').length >= maxRows) {
                    alert("You can only add up to 2 members.");
                } else {
                    addMoreForm();
                }
            });
        });

    </script>
    <script>

        $(document).ready(function() {

            $('#groupmem').on('change', function() {
                var selectedMembers = $(this).val();
                var currentRows = $('#addMore tr').length;

                if (selectedMembers < currentRows) {
                    $('#addMore tr:gt(' + (selectedMembers - 1) + ')').remove();
                }
                if (selectedMembers > currentRows) {
                    var rowsToAdd = selectedMembers - currentRows;
                    for (var i = 0; i < rowsToAdd; i++) {
                        var newRow = $('#addMore tr:first').clone();
                        newRow.find('input').val('');
                        newRow.find('select').val('');
                        newRow.appendTo('#addMore');
                    }
                }

                $('#addMore tr').each(function(index) {
                    if (index < 2) {
                        $(this).find('td').eq(4).show();
                    } else {
                        $(this).find('td').eq(4).hide();
                    }
                });
            });


            var selectedMembers = $('#groupmem').val();
            $('#addMore tr').each(function(index) {
                if (index < 2) {
                    $(this).find('td').eq(4).show();
                } else {
                    $(this).find('td').eq(4).hide();
                }
            });


        });

</script>

<script>
        $(document).ready(function() {
            $(document).ajaxStart(function() {

                $('#pageLoader').show();
            });

            $(document).ajaxStop(function() {
                $('#pageLoader').hide();
            });
        });
    </script>
