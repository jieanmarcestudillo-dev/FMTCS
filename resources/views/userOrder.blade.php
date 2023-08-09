
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('/css/welcome.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/cart.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ URL('/image/frontend/FMTCS.jpg')}}" type="image/x-icon">
    <title>FMTCS</title>
    @include('global')
</head>
<body class="">
    {{-- NAV BAR --}}
        @include('layouts.navbar')
    {{-- NAV BAR --}}

    

    <div style="margin-top: 10rem;"></div>
    
    <div class="container">
        <div class="position-relative d-flex align-items-center justify-content-center">
            <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Order Details</h1>
            <h1 class="position-absolute text-uppercase text-primary" style="color: #0C25B6 !important;"> 
                <a href="/viewOrder"><i class="bi bi-arrow-left-circle-fill"></i></a> View Order Details</h1>
        </div>
    </div>

        <!-- MAIN CONTENT -->
            <div id="page-content-wrapper">
                

                <!-- MAIN CONTENT -->
                <div class="mainBar container-fluid">
                    
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
                            <tbody id="orderDetails"></tbody>
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

    @php
        $amount = request()->input('amount');
        $referenceId = request()->input('referenceId');
    @endphp

    {{-- NAV BAR --}}
        @include('layouts.footer')
    {{-- NAV BAR --}}

    <script type="text/javascript" src="/js/userOrderDetails.js"></script>

</body>
</html>

            