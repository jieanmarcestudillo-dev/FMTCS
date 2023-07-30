<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('/css/welcome.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ URL('/image/frontend/FMTCS.jpg')}}" type="image/x-icon">
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
                            <h1>BOLTS</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{-- HERO SECTION --}}

    {{-- FOOTER SECTION --}}
        @include('layouts.footer')
    {{-- FOOTER SECTION --}}
</body>
</html>
