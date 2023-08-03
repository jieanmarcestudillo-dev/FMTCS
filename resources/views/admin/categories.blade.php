<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="{{ asset('/css/adminPortal.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ URL('/image/frontend/FMTCS.jpg')}}" type="image/x-icon">
    <title>FMTCS</title>
    @include('global')
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- SIDE BAR -->
            @include('layouts.adminSidebar')
        <!-- SIDE BAR -->

        <!-- MAIN CONTENT -->
            <div id="page-content-wrapper">
                <!-- NAV BAR -->
                    <nav class="navbar navbar-expand-lg border-bottom">
                        <div class="container-fluid">
                            <h4 class="text-uppercase">PRODUCT CATEGORIES</h4>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                    <li>
                                        <a class="nav-link me-3">
                                            <span>{{ auth()->user()->name}}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                <!-- NAV BAR -->

                <!-- MAIN CONTENT -->
                <div class="mainBar container-fluid ms-4">
                    <div class="row">
                        <div class="col-11 ms-4 text-end">
                            <button type="button" class="btn text-white rounded-0 px-4 py-2" style="background-color:#0C25B6">Add Category</button>
                        </div>
                    </div>
                    <div class="row g-0">
                        <div class="col-4 mt-3">
                            <div class="card shadow px-4 pt-3" style="width: 19rem;">
                                <img src="/storage/item/anchor.jpg" class="card-img-top" style="height: 13rem;">
                                <div class="card-body">
                                    <p class="card-text text-center mt-0 fs-4 fw-bold">GEARS</p>
                                    <div class="row g-0 text-center">
                                        <div class="col-6">
                                            <button type="button" style="background-color:#0C25B6" class="btn text-white rounded-0">Update</button>
                                        </div>
                                        <div class="col-6">
                                            <button type="button" style="background-color:#0C25B6" class="btn text-white rounded-0">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <div class="card shadow px-4 pt-3" style="width: 19rem;">
                                <img src="/storage/item/anchor2.jpg" class="card-img-top" style="height: 13rem;">
                                <div class="card-body">
                                    <p class="card-text text-center mt-0 fs-4 fw-bold">BOLTS</p>
                                    <div class="row g-0 text-center">
                                        <div class="col-6">
                                            <button type="button" style="background-color:#0C25B6" class="btn text-white rounded-0">Update</button>
                                        </div>
                                        <div class="col-6">
                                            <button type="button" style="background-color:#0C25B6" class="btn text-white rounded-0">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <div class="card shadow px-4 pt-3" style="width: 19rem;">
                                <img src="/storage/item/anchor1.jpg" class="card-img-top" style="height: 13rem;">
                                <div class="card-body">
                                    <p class="card-text text-center mt-0 fs-4 fw-bold">OTHERS</p>
                                    <div class="row g-0 text-center">
                                        <div class="col-6">
                                            <button type="button" style="background-color:#0C25B6" class="btn text-white rounded-0">Update</button>
                                        </div>
                                        <div class="col-6">
                                            <button type="button" style="background-color:#0C25B6" class="btn text-white rounded-0">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- MAIN CONTENT -->
            </div>
        <!-- MAIN CONTENT -->
    </div>

    <!-- JS -->
        <script src="{{ asset('/js/sideBar.js') }}"></script>
        <script src="{{ asset('/js/dateTime.js') }}"></script>
    <!-- JS -->
</body>
</html>
