<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('/css/welcome.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ URL('/image/frontend/FMTCS.jpg')}}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/input.css')}}">
    <title>FMTCS</title>
    @include('global')
</head>
<body>
    {{-- NAV BAR --}}
        @include('layouts.navbar')
    {{-- NAV BAR --}}

    {{-- HERO SECTION --}}
        <div class="container-fluid g-0 mt-lg-5" id="heroSection">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./image/frontend/banner-3.jpg" class="d-block w-100 img-fluid border-0">
                        <div class="overlay-text text-center">
                            <h1>Products</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{-- HERO SECTION --}}


    {{-- Content section --}}
    <div class="d-flex justify-content-center">
        <div style="width:400px;" class="p-3">
            <label>Select Category</label>
            <select class="form-select" id="product_filter" onchange="loadFilteredProducts(this.value)">
                
            </select>
        </div>
    </div>
    <div class="container">
      <div class="d-flex flex-wrap" id="products_content">

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
