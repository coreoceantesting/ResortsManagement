<!doctype html>
<html lang="en" data-layout="horizontal" data-topbar="dark" data-sidebar="dark" data-sidebar-size="lg" data-bs-theme="{{ $themeMode }}" data-body-image="img-1" data-preloader="enable" data-sidebar-visibility="show" data-layout-style="default"
    data-layout-width="fluid" data-layout-position="fixed">

<head>
    <meta charset="utf-8" />
    <title>Next Holiday | {{ $title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}">
    <!--datatable css-->

    <link rel="stylesheet" href="{{ asset('admin/datatables/1.11.5/css/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/datatables/responsive/2.2.9/css/responsive.bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/datatables/buttons/2.2.2/css/buttons.dataTables.min.css') }}">
    <link href="{{ asset('admin/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('admin/js/layout.js') }}"></script>
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@5.8.0/dist/css/coreui.min.css" rel="stylesheet" integrity="sha384-hbx3WW3VEnpFGfGaaDgwb9GZ5DxxQebbCzE/MHHkkH7RbRhEoI3aXxDAFxNnTGnt" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@5.8.0/dist/js/coreui.bundle.min.js" integrity="sha384-aUfnS+hkMBjwlmClHswy/heTcxNQGkwv2aZATR+O6N9AfSs9Q3a2BJZSlrMeg2sS" crossorigin="anonymous"></script>

    @stack('styles')
</head>

<body>

    <div id="layout-wrapper">

    <x-admin.header />

        <x-admin.sidebar />

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">


                <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-transparent">
                                <h4 class="mb-sm-0">{{ $heading }}</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item">
                                            <a href="{{ auth()->check() ? route('home') : route('welcome') }}">Home</a>
                                        </li>
                                        <li class="breadcrumb-item {{ isset($subheading) ? '' : 'active' }}">
                                            {{ $heading }}
                                        </li>
                                        @if(isset($subheading))
                                            <li class="breadcrumb-item active">
                                                {{ $subheading }}
                                            </li>
                                        @endif
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ $slot }}


                </div>
            </div>
                <!-- Loader HTML -->
                <div id="pageLoader" style="display: none;">
                    <div class="loader"></div>
                </div>

            <x-admin.footer />
        </div>
    </div>





    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>



    <!-- JAVASCRIPT -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('admin/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('admin/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('admin/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('admin/libs/jsvectormap/maps/world-merc.js') }}"></script>
    <script src="{{ asset('admin/js/pages/dashboard-analytics.init.js') }}"></script>
    <script src="{{ asset('admin/js/app.js') }}"></script>
    <script src="{{ asset('admin/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin/js/pages/select2.init.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--datatable js-->
    <script src="{{ asset('admin/datatables/1.11.5/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/datatables/1.11.5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('admin/datatables/responsive/2.2.9/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/datatables/buttons/2.2.2/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/datatables/buttons/2.2.2/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin/datatables/buttons/2.2.2/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/datatables/ajax/libs/pdfmake/0.1.53/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/datatables/ajax/libs/pdfmake/0.1.53/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin/datatables/ajax/libs/jszip/3.1.3/jszip.min.js') }}"></script>
    <script src="{{ asset('admin/js/pages/datatables.init.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</body>
<style>
    /* For mobile view (less than 768px wide) */
    @media (max-width: 768px) {
        #back-to-top {
            display: block;
        }
    }

    /* For larger screens (desktop view) */
    @media (min-width: 769px) {
        #back-to-top {
            display: none;
        }
    }
</style>
{{-- AddForm n EditForm Open/Close jquery --}}
<script>
    $(document).ready(function() {

        $("#btnCancel").click(function() {
            $("#addContainer").slideUp();
            $("#editContainer").slideUp();
            $(this).hide();
            $("#addToTable").show();
        });
    });

    $(document).ready(function() {
        $("#addToTable").click(function(e) {
            e.preventDefault();
            // var id = $(this).attr('data-id');
            $("#addContainer").slideDown();
            $("#editContainer").slideUp();
            $("#btnCancel").show();

        });
    });
</script>

{{-- Add / Update Form validation --}}
<script>
    function resetErrors() {
        var form = document.getElementById('addForm');
        if(form)
        {
            var data = new FormData(form);
            for (var [key, value] of data) {
                var field = key.replace('[]', '');
                $('.' + field + '_err').text('');
                $("[name='"+field+"']").removeClass('is-invalid');
                $("[name='"+field+"']").addClass('is-valid');
            }
        }

        var form = document.getElementById('editForm');
        if(form)
        {
            var data = new FormData(form);
            for (var [key, value] of data) {
                var field = key.replace('[]', '');
                $('.' + field + '_err').text('');
                $("[name='"+field+"']").removeClass('is-invalid');
                $("[name='"+field+"']").addClass('is-valid');
            }
        }
    }

    function printErrMsg(msg) {
        $.each(msg, function(key, value) {
            var field = key.replace('[]', '');
            $('.' + field + '_err').text(value);
            $("[name='"+field+"']").addClass('is-invalid');
            $("[name='"+field+"']").removeClass('is-valid');
        });
    }

    function editFormBehaviour() {
        $("#addContainer").slideUp();
        $("#btnCancel").show();
        $("#addToTable").hide();
        $("#editContainer").slideDown();
        $("html, body").animate({ scrollTop: 0 }, "slow");
    }
</script>


@stack('scripts')


<style>

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        background-color: #f4f4f4;
    }

    .table {
        width: 100%;
        table-layout: auto;
    }

    /* For small screens (mobile devices) */
    @media (max-width: 767px) {
        thead {
            display: none; /* Hide headers */
        }

        tbody tr {
            display: block;
            margin-bottom: 10px;
            border: 1px solid #ddd;
        }

        tbody tr td {
            display: block;
            text-align: left;
            position: relative;
            padding-left: 50%;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        tbody tr td::before {
            content: attr(data-label);
            position: absolute;
            left: 10px;
            top: 10px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .table td {
            padding: 8px 15px;
            border-top: 1px solid #ddd;
        }

        .row {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .row .col-sm-4 {
            width: 100%;
            display: flex;
            justify-content: center;
        }
        .btn {
            width: 100%;
            text-align: center;
        }
    }
    @media (min-width: 768px) and (max-width: 1024px) {
        .table {
            font-size: 14px;
        }
    }
    @media (min-width: 1025px) {
        .table {
            font-size: 16px;
        }
    }

        /* Page Loader Styles */
    #pageLoader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
    }

    .loader {
        border: 5px solid #f3f3f3; /* Light gray */
        border-top: 5px solid #3498db; /* Blue */
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

</style>




</html>

