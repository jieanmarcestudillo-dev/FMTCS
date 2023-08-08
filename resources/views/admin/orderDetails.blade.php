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
                            <h4 class="text-uppercase">ORDER DETAILS</h4>
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
                <div class="mainBar container-fluid">
                    <div class="row">
                        <div class="col-3 bg-body">
                            <div class="card text-center" style="width: 16.5rem; height:130px;">
                                <div class="card-header text-uppercase py-3 fw-bold text-white" style="background-color: #0C25B6; letter-spacing:1px;">
                                    Customer Name
                                </div>
                                <ul class="list-group list-group-flush">
                                <li class="list-group-item fw-bold pt-4 mt-1 text-muted" id="name"  style="letter-spacing: 1px; font-size:14px;"></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-3 bg-body">
                            <div class="card text-center" style="width: 16.5rem; height:130px;">
                                <div class="card-header text-uppercase py-3 fw-bold text-white" style="background-color: #0C25B6; letter-spacing:1px;">
                                    Shipping Address
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item fw-bold py-3 text-muted" id="address" style="letter-spacing: 1px; font-size:14px;"></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-3 bg-body">
                            <div class="card text-center" style="width: 16.5rem; height:130px;">
                                <div class="card-header text-uppercase py-3 fw-bold text-white" style="background-color: #0C25B6; letter-spacing:1px;">
                                Phone Number
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item fw-bold pt-4 mt-1 text-muted" id="phone" style="letter-spacing: 1px; font-size:14px;"></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-3 bg-body">
                            <div class="card text-center" style="width: 16.5rem; height:130px;">
                                <div class="card-header text-uppercase py-3 fw-bold text-white" style="background-color: #0C25B6; letter-spacing:1px;">
                                    Order Date
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item fw-bold pt-4 mt-1 text-muted" id="orderDate" style="letter-spacing: 1px; font-size:14px;"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="bg-body pt-4 pb-2 px-5 bg-body rounded shadow-lg my-3">
                        <div class="col-12 mx-auto">
                            <div class="card text-center pt-3 bg-light border-0">
                                <p class="fw-bold" style="letter-spacing: 1px; font-size:15px;">PRODUCT SUMMARY</p>
                            </div>
                        </div>
                        <table class="table table-border text-center align-middle mt-2">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase">No.</th>
                                    <th class="text-center text-uppercase">Image</th>
                                    <th class="text-center text-uppercase">Product</th>
                                    <th class="text-center text-uppercase">Price</th>
                                    <th class="text-center text-uppercase">Quantity</th>
                                    <th class="text-center text-uppercase">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody id="getAllOrders"></tbody>
                        </table>
                        <div class="row">
                            <div class="col-3 ms-auto mt-3 me-3">
                                <div class="row g-2">
                                    <div class="col-6">
                                        <p style="font-size:16px;" class="fw-bold text-end">Shipping Fee:</p>
                                    </div>
                                    <div class="col-6" style="color:#0C25B6">
                                        <p style="font-size:16px;" class="fw-bold text-start">Php 100.00</p>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <p style="font-size:16px;" class="fw-bold text-end">Total:</p>
                                    </div>
                                    <div class="col-6" style="color:#0C25B6">
                                        <p style="font-size:16px;" class="fw-bold text-start" id="getTotal"></p>
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
        <script src="{{ asset('/js/administrator/orderDetails.js') }}"></script>
        <script src="{{ asset('/js/logout.js') }}"></script>
        <script src="{{ asset('/js/sideBar.js') }}"></script>
        <script src="{{ asset('/js/dateTime.js') }}"></script>
    <!-- JS -->
</body>
</html>
