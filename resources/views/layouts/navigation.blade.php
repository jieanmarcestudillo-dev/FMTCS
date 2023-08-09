    <nav class="navbar navbar-expand-lg navbar-light bg-body fixed-top px-lg-5 shadow-sm text-lg-start text-center">
        <div class="container-fluid ">
            <a class="navbar-brand" href="#">
                <img src="./image/frontend/logo.png" class="d-block w-100">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item mx-3">
                    <a class="nav-link" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link" href="#aboutSection">About</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link" href="#servicesSection">Services</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link" href="/viewProducts">Products</a>
                </li>
                </ul>

                <form class="d-flex mb-lg-0 mb-1">
                    <input class="form-control rounded-0 ps-3 bg-body" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn rounded-0 px-3 py-2" type="submit"><i class="bi bi-search"></i></button>
                </form>

                @if(Auth::check())
                    
                    <div class="dropdown">
                        <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                            {{Auth::user()->name}}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('viewOrder') }}">Order History</a></li>
                            <li>
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button style="background-color:transparent; color:#0C25B6; border:none;" class="dropdown-item" type="submit" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</button>
                                </form>
                            </li>
                        </ul>
                    </div>

                @else
                    <a href="/login" class="btn ms-lg-2 me-lg-0 me-5 rounded-0 user" data-title="Login?" type="button"><i class="bi bi-person"></i></a>
                @endif

                    <a class="btn rounded-0 cart" href="/viewCart"><i class="bi bi-cart"></i></a>
            </div>
        </div>
    </nav>
