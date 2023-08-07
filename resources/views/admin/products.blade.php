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
                            <h4 class="text-uppercase">PRODUCTS</h4>
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
                        <div class="row mb-2 me-3">
                            <div class="col-2 text-end">
                                <select class="form-select form-select-lg rounded-0 py-2" aria-label="Default select example" id="itemCategoryFilter" onchange="itemCategoryFilter(this.value)"></select>
                            </div>
                            <div class="col-4 me-auto text-end">
                                <form class="d-flex">
                                    <input class="form-control rounded-0 border-2" type="search" placeholder="Search By Product Serial Number" aria-label="Search" id="searchProduct">
                                    <button class="btn rounded-0 text-white" style='background-color:#0C25B6;' type="submit">Search</button>
                                </form>
                            </div>
                            <div class="col-3 text-end">
                                <button type="button" class="btn rounded-0 text-white rounded px-4 py-2" data-bs-toggle="modal" data-bs-target="#addProduct" style="background-color:#0C25B6">Add New Product</button>
                            </div>
                        </div>
                        <div cla+s="row g-0" id="getAllProducts"></div>
                    </div>
                <!-- MAIN CONTENT -->
            </div>
        <!-- MAIN CONTENT -->
    </div>

    <!-- JS -->
        <script src="{{ asset('/js/administrator/product.js') }}"></script>
        <script src="{{ asset('/js/logout.js') }}"></script>
        <script src="{{ asset('/js/sideBar.js') }}"></script>
        <script src="{{ asset('/js/dateTime.js') }}"></script>
    <!-- JS -->

    {{-- MODAL --}}
        <div class="modal fade" id="addProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-11">
                            <h5 class="modal-title" id="staticBackdropLabel">NEW PRODUCT</h5>
                        </div>
                        <div class="col-1">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    </div>
                    <form id="addProductForm">
                    <div class="row my-3 px-1 g-2">
                        <div class="col-5 mb-3">
                            <label class="form-label ps-1">Serial Number:</label>
                            <input type="text" name="itemSerialNumber" class="form-control bg-body">
                        </div>
                        <div class="mb-3 col-7">
                            <label class="form-label ps-1">Item Image:</label>
                            <input type="file" name="itemImage" class="form-control bg-body">
                        </div>
                        <div class="col-4 mb-3">
                            <label class="form-label ps-1">Item Name:</label>
                            <input type="text" name="itemName" class="form-control bg-body">
                        </div>
                        <div class="col-4 mb-3">
                            <label class="form-label ps-1">Category:</label>
                            <select class="form-select" id="itemCategory" name="itemCategory"></select>
                        </div>
                        <div class="col-4 mb-3">
                            <label class="form-label ps-1">Supplier:</label>
                            <select class="form-select" id="itemSupplier" name="itemSupplier"></select>
                        </div>
                        <div class="col-4 mb-3">
                            <label class="form-label ps-1">Quantity:</label>
                            <input type="number" name="itemQty" class="form-control bg-body">
                        </div>
                        <div class="col-4 mb-3">
                            <label class="form-label ps-1">Cost:</label>
                            <input type="text" name="itemCost" class="form-control bg-body">
                        </div>
                        <div class="col-4 mb-3">
                            <label class="form-label ps-1">Price:</label>
                            <input type="text" class="form-control bg-body" name="itemPrice">
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label ps-1">Description:</label>
                            <textarea class="form-control bg-body" style="resize: none; height: 100px;" name="itemDescription"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 ms-auto">
                            <button type="button" class="btn rounded-0 btn-secondary px-4" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn rounded-0 text-white px-4" style="background-color:#0C25B6">Submit</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    {{-- MODAL --}}
</body>
</html>
