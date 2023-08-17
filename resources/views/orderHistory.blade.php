
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
            <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Orders</h1>
            <h1 class="position-absolute text-uppercase text-primary" style="color: #0C25B6 !important;">View Order History</h1>
        </div>
    </div>

    <!-- MAIN CONTENT -->
                <div class="mainBar container">
                    <div class="bg-body py-5 px-5 bg-body rounded shadow-lg">
                        
                            <table id="myTable" class="table table-border text-center align-middle">
                                <thead>
                                    <tr>
                                        <th class="text-center">Tracking No.</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Payment</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                    </div>
                </div>

    @php
        $amount = request()->input('amount');
        $referenceId = request()->input('referenceId');
    @endphp

    {{-- NAV BAR --}}
        @include('layouts.footer')
    {{-- NAV BAR --}}

    <script type="text/javascript" src="/js/userOrder.js"></script>

</body>
</html>
