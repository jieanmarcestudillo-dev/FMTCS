
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('/css/welcome.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/products1.css')}}">
    <link rel="shortcut icon" href="{{ URL('/image/frontend/FMTCS.jpg')}}" type="image/x-icon">
    <title>FMTCS</title>
    @include('global')
</head>
<body>
    {{-- NAV BAR --}}
        @include('layouts.navbar')
    {{-- NAV BAR --}}

    {{-- HERO SECTION --}}
        <div class="container-fluid g-0 mt-5 pt-lg-0 pt-1" id="heroSection">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img alt="image" src="./image/frontend/banner-3.jpg" class="d-block w-100 img-fluid border-0">
                        <div class="overlay-text text-center">
                            <h3>YOUR DEPENDABLE PARTNER IN <br> FABRICATION TECHNOLOGY</h3>
                            <button class="btn rounded-pill mt-lg-2">Shop Now</button>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img alt="image" src="./image/frontend/large_fmtcs1.png" class="d-block w-100 img-fluid border-0">
                    </div>
                    <div class="carousel-item">
                        <img alt="image" src="./image/frontend/banner-3.jpg" class="d-block w-100 img-fluid border-0">
                        <div class="overlay-text text-center">
                            <h3>YOUR DEPENDABLE PARTNER IN <br> FABRICATION TECHNOLOGY</h3>
                            <button class="btn rounded-pill mt-lg-2 mt-3">Shop Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{-- HERO SECTION --}}

    {{-- CATEGORY SECTION --}}
        <div class="container-fluid py-5 mt-3" id="categorySection">
            <div class="container">
                <div class="position-relative d-flex align-items-center justify-content-center">
                    <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Products</h1>
                    <h1 class="position-absolute text-uppercase text-primary">Featured Products</h1>
                </div>
            </div>
            <div class="container mt-3">
                <div class="d-flex flex-wrap text-center" id="featured_content">

                </div>
            </div>
        </div>
    {{-- CATEGORY SECTION --}}

    {{-- ABOUT SECTION --}}
        <div class="container-fluid g-0 mt-lg-5" id="aboutSection">
            <img alt="image" src="./image/frontend/banner-2.jpg" class="d-block w-100 img-fluid border-0">
            <div class="overlay-text text-start">
                <h3>FMTCS INDUSTRIAL CORPORATION</h3>
                <p>Welcome to FMTCS Industrial Corporation, a leading name in the world of industrial solutions. Established with a vision to revolutionize the industrial sector, FMTCS stands for cutting-edge technology, exceptional quality, and unparalleled customer service. With a diverse portfolio of products and services, we cater to a wide range of industries, including manufacturing, construction, energy, and more. Our commitment to innovation and sustainability drives us to provide state-of-the-art solutions that enhance productivity, efficiency, and safety. Join us on this journey as we continue to shape the future of industries, one breakthrough at a time. FMTCS Industrial Corporation: Empowering Industries, Empowering the World.</p>
            </div>
        </div>
    {{-- ABOUT SECTION --}}

    {{-- SERVICES SECTION --}}
        <div class="container-fluid py-5 mt-lg-3" id="servicesSection">
            <div class="container">
                <div class="position-relative d-flex align-items-center justify-content-center">
                    <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Services</h1>
                    <h1 class="position-absolute text-uppercase text-primary">Services</h1>
                </div>
            </div>
            <div class="container mt-3">
                <div class="row justify-content-around text-center">
                    <div class="col-lg-4 col-sm-12">
                        <a href="#">
                            <div class="card p-1 bg-body">
                                <div class="card-body">
                                    <img alt="image" src="./image/frontend/gear.png" class="card-img-top rounded-circle" alt="...">
                                    <a href="#" class="btn btn-link nav-link mt-lg-3 mt-4">CNC MACHINING</a>
                                    <p class="mt-2">Unlock Precision and Efficiency with Our CNC Machining Services. Let us bring your ideas to life with cutting-edge technology and expert craftsmanship. From prototyping to mass production, we deliver unmatched accuracy and quality for all your industrial needs.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 my-lg-0 col-sm-12 my-4">
                        <a href="#">
                            <div class="card p-1 bg-body">
                                <div class="card-body">
                                    <img alt="image" src="./image/frontend/bolts.jpg"  class="card-img-top rounded-circle" alt="...">
                                    <a href="#" class="btn btn-link nav-link mt-lg-3 mt-4">MACHINE SHOP, RUBBER,PARTS</a>
                                    <p class="mt-2">Precision at its Finest! Our state-of-the-art machine shop specializes in crafting top-quality rubber parts for all your industrial needs. From custom designs to high-volume production, we've got you covered. Experience unmatched accuracy and reliability with our expertly manufactured rubber components.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <a href="#">
                            <div class="card p-1 bg-body">
                                <div class="card-body">
                                    <img alt="image" src="./image/frontend/machine.jpg"  class="card-img-top rounded-circle" alt="...">
                                    <a href="#" class="btn btn-link nav-link mt-lg-3 mt-4">GEARS AND FILTERS FABRICATION</a>
                                    <p class="mt-2">Gear up for Precision: Discover our top-notch gears and filters fabrication services, delivering unmatched accuracy and durability for your industry needs. Trust the experts at FMTCS to engineer solutions that power your machinery and ensure optimal performance.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    {{-- SERVICES SECTION --}}

    {{-- NAV BAR --}}
        @include('layouts.footer')
    {{-- NAV BAR --}}

    @include('modals.view_product_details')

    <script type="text/javascript" src="/js/products.js"></script>
    <script type="text/javascript" src="/js/featured.js"></script>
</body>
</html>
