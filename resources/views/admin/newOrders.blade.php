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
                            <h4 class="text-uppercase">NEW ORDERS</h4>
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
                <div class="mainBar container">
                    <div class="bg-body py-4 px-5 bg-body rounded shadow-lg">
                        <ul class="nav nav-tabs mb-4">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">&nbsp;&nbsp;Pending&nbsp;&nbsp;</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">To Ship</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">To Received</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Completed</a>
                            </li>
                        </ul>
                            <table id="newOrdersTable" class="table table-sm table-bordered text-center align-middle">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Order ID</th>
                                        <th class="text-center">Customer</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center col-2">Action</th>
                                    </tr>
                                </thead>
                            </table>
                    </div>
                </div>
                <!-- MAIN CONTENT -->
            </div>
        <!-- MAIN CONTENT -->
    </div>

    <!-- JS -->
        <script src="{{ asset('/js/administrator/newOrders.js') }}"></script>
        <script src="{{ asset('/js/sideBar.js') }}"></script>
        <script src="{{ asset('/js/dateTime.js') }}"></script>
    <!-- JS -->
</body>
</html>
