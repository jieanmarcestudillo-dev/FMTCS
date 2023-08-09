<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ORDER REPORTS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</head>
{{-- STYLE --}}
    <style>
            @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;900&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;900&display=swap');
            .font {
                font-family: 'Roboto', sans-serif !important;
            }

            table {
                border: 1px solid black;
            }

            th,
            td {
                border: 1px solid black;
                padding: .5rem 0;
            }

            /* img{
                position: absolute;
                right: -40px !important;
                top: -50px !important;
            } */
            .font-size {
                font-size: 14px !important;
            }

            body {
            font-family: Arial, sans-serif;
            }

            .header {
            text-align: center;
            margin-bottom: 20px;
            }

            .name {
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
            }

            .contact-info {
            font-size: 14px;
            margin-bottom: 10px;
            text-transform: uppercase;
            }

            .section {
            margin-bottom: 20px;
            }

            .section-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            text-transform: uppercase;
            }

            .subsection-title {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
            }

            .item {
            margin-bottom: 5px;
            }

            .item-title {
            font-weight: bold;
            display: inline-block;
            width: 120px;
            }

            .item-content {
            display: inline-block;
            }

            .table{
                margin-top: -30px;
            }

            .table thead{
                font-size: 12px;
                font-weight: 500;
            }
    </style>
{{-- STYLE --}}

<body>
    {{-- HEADER --}}
    <header class="text-center lh-base" style="">
        <img class="mb-2" src="./image/frontend/logo.png" style="width: 200px">
        <p class="m-0">FMTCS Industrial Corp. Est. 1990</p>
        <p class="m-0">46, Rizal Avenue Extension, Caloocan City, Metro Manila</p>
        <p class="mt-0">sales.fmtcsindustrialcorp@gmail.com <br> 09283521893</p>
    </header>
    {{-- HEADER --}}

    {{-- BODY --}}
    <div class="section mt-4">
        <p class="fw-bold font-size font text-center mt-4">ORDERS SUMMARY</p>
    </div>
    <p class='mt-2 text-muted'>Customer Information:</p>
    <p>Name: {{ $customer->name }}</p>
    <p>Address: {{ $customer->address }}</p>
    <p>Phone: {{ $customer->phone }}</p>
    <table class="table table-sm table-border text-center align-middle mt-3">
        <thead>
            <tr>
                <th class="text-center">No.</th>
                <th class="text-center">Product</th>
                <th class="text-center">Price</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order as $count => $certainOrder)
            <tr class="font-size font">
                <td>{{ $count + 1 }}</td>
                <td>{{ $certainOrder->prod_name }}</td>
                <td>{{ $certainOrder->prod_price }}</td>
                <td>{{ $certainOrder->qty }}</td>
                <td>{{ $certainOrder->price }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p class='text-end text-muted'>Shipping Fee: Php 100.00</p>
    <p class='text-end fw-bold'>Total Amount: Php {{ $total }}.00</p>
</body>

</html>
