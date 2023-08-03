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
                            <h4 class="text-uppercase">Dashboard</h4>
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
                    <div class="container-fluid mainBar mb-5">
                            <div class="row mb-3">
                                <div class="col-4">
                                    <div class="card shadow" style="height:8rem; border-radius:10px; background-color:#ffff;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-4 text-center">
                                                    <i class="bi bi-briefcase"></i>
                                                </div>
                                                <div class="col-8 text-center cardInfo">
                                                    <p class="card-text fw-bold cardText">TOTAL SALES</p>
                                                    <p class="card-text fw-bold cardNo"id="totalUpcomingOperation">1234.00</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card shadow" style="height:8rem; border-radius:10px; background-color:#ffff;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-4 text-center">
                                                    <i class="bi bi-person-workspace"></i>
                                                </div>
                                                <div class="col-8 text-center cardInfo">
                                                    <p class="card-text fw-bold cardText">PRODUCT SOLD</p>
                                                    <p class="card-text fw-bold pe-2 cardNo"id="totalForeman">153</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card shadow" style="height:8rem; border-radius:10px; background-color:#ffff;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-4 text-center">
                                                    <i class="bi bi-people-fill"></i>
                                                </div>
                                                <div class="col-8 text-center cardInfo">
                                                    <p class="card-text fw-bold cardText">PRODUCTS</p>
                                                    <p class="card-text fw-bold pe-2 cardNo"id="totalApplicants">56</p>
                                                </div>
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
