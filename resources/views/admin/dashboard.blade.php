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
                                <div class="col-3">
                                    <div class="card shadow" style="height:8rem; border-radius:10px; background-color:#ffff;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-3 text-center">
                                                    <i class="bi bi-briefcase"></i>
                                                </div>
                                                <div class="col-9 text-center" style="line-height:19px; padding-top:1.5rem">
                                                    <p class="card-text fw-bold cardHeader" style="font-size: 13px;">UPCOMING OPERATION</p>
                                                    <p class="card-text fw-bold text-secondary" style="font-size: 2rem;" id="totalUpcomingOperation">0</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="card shadow" style="height:8rem; border-radius:10px; background-color:#ffff;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-3 text-start">
                                                   <i class="bi bi-calendar-check"></i>
                                                </div>
                                                <div class="col-9 text-start" style="line-height:19px; padding-top:1.5rem">
                                                    <p class="card-text fw-bold cardHeader" style="font-size: 12px;">COMPLETED OPERATION</p>
                                                    <p class="card-text fw-bold text-secondary text-center pe-4" style="font-size: 2rem;" id="totalCompletedOperation">0</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="card shadow" style="height:8rem; border-radius:10px; background-color:#ffff;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-3 text-start">
                                                    <i class="bi bi-person-workspace"></i>
                                                </div>
                                                <div class="col-9 text-center" style="line-height:19px; padding-top:1.5rem">
                                                    <p class="card-text fw-bold cardHeader" style="font-size: 13px; letter-spacing:1px;">MANPOWER POOLING</p>
                                                    <p class="card-text fw-bold text-secondary pe-2" style="font-size: 2rem;" id="totalForeman">0</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="card shadow" style="height:8rem; border-radius:10px; background-color:#ffff;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-3 text-start">
                                                    <i class="bi bi-people-fill"></i>
                                                </div>
                                                <div class="col-9 text-center" style="line-height:19px; padding-top:1.5rem">
                                                    <p class="card-text fw-bold cardHeader" style="font-size: 13px; letter-spacing:1px;">PROJECT WORKERS</p>
                                                    <p class="card-text fw-bold text-secondary pe-2" style="font-size: 2rem;" id="totalApplicants">0</p>
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
