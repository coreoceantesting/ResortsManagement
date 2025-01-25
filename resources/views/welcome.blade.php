
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>welcome Page</title>
        <link rel="shortcut icon" href="https://pmc.maharts.com/admin/images/favicon.png">
        <link href="https://pmc.maharts.com/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
    body {
        background-color: #f0f8ff;
        overflow-x: hidden;
    }

    .bg-img {
        background-image: url('{{ asset("admin/images/resort.jpg") }}');
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
        content: "";
        height: 100vh;
    }

    .right-content-div {
        background: #284db2;
        color: #fff;
        padding: 3% 2%;
        text-align: center;
        margin: 0% 10%;
        font-size: 18px;
        font-weight: 800;
        border-radius: 10px;
    }

    .custompadding {
        padding: 5% 10%;
    }

    .form-control {
        padding: 10px;
        border: 1px solid #2b5de4;
    }

    /* Desktop and larger devices: no changes here */
    @media only screen and (min-width: 1200px) {
        .bg-img {
            background-position: 1%;
        }
    }

    /* Tablet and smaller devices */
    @media only screen and (max-width: 1115px) {
        .bg-img {
            background-position: 16%;
        }
    }

    /* Mobile specific styling */
    @media only screen and (max-width: 767px) {
        .bg-img {
            background-image: none;
            background-color: #fff;
            height: auto;
            display: flex;
            justify-content: center;
        }

        .mobile-view-bgcolor {
            background-color: #234cb3;
        }

        .mobile-view-bgcolor,
        body {
            background-color: #234cb3;
        }

        .form-control {
            padding: 10px;
            background-color: #fff;
            border: 1px solid #fff;
        }

        .form-label,
        .form-check-label {
            color: #fff;
        }

        #loginForm_submit {
            background-color: #fff;
            color: #234cb3;
            font-weight: 900;
            font-size: 18px;
            width: 50% !important;
        }

        .textSignup {
            color: #fff!important;
        }

        /* Stack cards vertically on mobile */
        .custom-card {
            width: 100%;
            max-width: 100%;
            margin: 15px auto;
        }

        .custom-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .custom-card .card-body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .custom-card .btn {
            display: block;
            text-align: center;
        }

        /* Make images responsive */
        .custom-card img {
            height: 100px;
            object-fit: cover;
        }

        /* Center text and buttons in the card */
        .custom-card .btn {
            margin-top: 10px;
        }

        .custompadding {
            padding: 5% 3%;
        }
    }
</style>

<body>
    <section class="">
        <div class="container-fluid">
            <div class="row">
                <!-- Background Image for Desktop View -->
                <div class="bg-img col-lg-6 col-md-6 col-12 d-flex justify-content-center">
                    <img class="d-md-none d-lg-none d-xl-none d-sm-block d-block mt-4" src="" style="width: 300px;">
                </div>
                <!-- Mobile View -->
                <div class="col-lg-6 col-md-6 col-12 d-md-none d-lg-none d-xl-none d-sm-block d-block mobile-view-bgcolor">
                    <img src="https://pmc.maharts.com/admin/images/login/mobile.png" style="width: 100%" alt="">
                </div>
                <div class="col-lg-6 col-md-6 col-12 mobile-view-bgcolor">
                    <div class="container custompadding">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card custom-card">
                                    <img class="card-img-top" src="{{ asset('admin/images/couple.jpg') }}" alt="Couple" style="height: 225px;">
                                    <div class="card-body">
                                        <a href="{{ route('couple.index') }}" class="btn btn-primary">Couple</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Second Row of Cards -->
                        <div class="row">
                            <div class="col-md-6 py-3">
                                <div class="card custom-card">
                                    <img class="card-img-top" src="{{ asset('admin/images/group.jpg') }}" alt="group">
                                    <div class="card-body">
                                        <a href="{{ route('group.index') }}" class="btn btn-primary">Group</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


        <script src="https://pmc.maharts.com/admin/js/jquery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://pmc.maharts.com/admin/js/sweetalert.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>
</html>