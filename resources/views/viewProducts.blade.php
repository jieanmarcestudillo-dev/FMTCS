<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('/css/welcome.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ URL('/image/frontend/FMTCS.jpg')}}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/input.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/products.css')}}">
    <title>FMTCS</title>
    @include('global')
</head>
<body>
    {{-- NAV BAR --}}
        @include('layouts.navbar')
    {{-- NAV BAR --}}


    {{-- Content section --}}
    <div style="margin-top:100px;"></div>
    <div class="d-flex justify-content-end">
        <div class="p-3">
            <select class="form-select " id="product_filter" onchange="sort_products(this.value)">
                <option value="0" selected hidden>Sort By</option>
                <option value="1">Lowest Price</option>
                <option value="2">Highest Price</option>
            </select>
        </div>
    </div>

    <div class="row m-5">
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
            <h5 class="text ">Product Categories</h5>
            <hr>
            <ul class="category" id="category_list">
            </ul>
        </div>
        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 d-flex">
            <div class="d-flex flex-wrap" id="products_content">

            </div>
            <div id="pagination-container"></div>
        </div>
    </div>

    {{-- Content section --}}


    @include('modals.view_product_details')

    {{-- FOOTER SECTION --}}
        @include('layouts.footer')
    {{-- FOOTER SECTION --}}

   <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/js/products.js"></script>

</body>
</html>
