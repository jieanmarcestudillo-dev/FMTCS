
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
            <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Cart</h1>
            <h1 class="position-absolute text-uppercase text-primary" style="color: #0C25B6 !important;">Shopping Cart</h1>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <div class="row container">
            <div class="col-xl-8 col-lg-8 col-lg-8 col-md-8 col-sm-12">
                <table class="table table-hovered ">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody id="cartList">
                        

                    </tbody>
                    <tfoot >
                        <tr >
                            <td colspan="4">
                                <div class="d-flex justify-content-end">
                                    <a href="/viewProducts" class="btn rounded-0 text-white" style="background-color:#0C25B6" >Continue Shopping</a>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col-xl-4 col-lg-4 col-lg-4 col-md-4 col-sm-12 border" style="border-color:#D9D9D9" id="cartCheckout">
                <div class="p-2">
                    <p class="text-center"><b>Cart Total</b></p>
                    <hr style="position:relative; top:-10px;">
                    <div class="row">
                        <p class="col-6" style="padding-left:30px;">Subtotal</p>
                        <p class="col-6 d-flex justify-content-end" style="padding-right:30px;"><span id="total_price"></span></p>
                    </div>
                    <hr style="position:relative; top:-10px;">
                    <div class="row">
                        <p class="col-6" style="padding-left:30px;">Shipping To</p>
                        <p class="col-6 d-flex justify-content-end" style="text-align: justify; padding-right:30px;">
                            <span>
                                <span >
                                    {{Auth::user()->address}}
                                </span>
                            </span>
                        </p>
                    </div>
                    <hr style="position:relative; top:-10px;">
                    <div class="row">
                        <p class="col-6" style="padding-left:30px;">Shipping Fee</p>
                        <p class="col-6 d-flex justify-content-end" style="text-align: justify; padding-right:30px;">
                            <span>
                                Php
                                <span >
                                    150
                                </span>
                            </span>
                        </p>
                    </div>
                    <hr style="position:relative; top:-10px;">
                    <div class="row">
                        <p class="col-6" style="padding-left:30px;"><b>Total</b></p>
                        <p class="col-6 d-flex justify-content-end" style="text-align: justify; padding-right:30px;">
                            <span>
                                Php
                                <span >
                                    1,500
                                </span>
                            </span>
                        </p>
                    </div>
                    <hr style="position:relative; top:-10px;">
                                        <div class="row">
                        <p class="col-6" style="padding-left:30px;"><b>Select Payment Type</b></p>
                        <p class="col-6 d-flex justify-content-end" style="text-align: justify; padding-right:30px;">
                            <select class="form-select" id="payment_type">
                                <option value="0" selected hidden>Select</option>
                                <option value="1">COD</option>
                                <option value="2">ONLINE</option>
                            </select>
                        </p>
                    </div>
                    <hr style="position:relative; top:-10px;">
                    <button class="btn rounded-0 text-white form-control" onclick="check_out()" style="background-color:#0C25B6">Proceed to Payment</button>
                </div>
            </div>
        </div>
    </div>

    {{-- NAV BAR --}}
        @include('layouts.footer')
    {{-- NAV BAR --}}

    @include('modals.view_product_details')

    <script type="text/javascript" src="/js/cart.js"></script>
</body>
</html>
