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
                            <h4 class="text-uppercase">SUPPLIER</h4>
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
                    <div class="mainBar container">
                        <div class="bg-body py-4 px-5 bg-body rounded shadow-lg">
                            <div class="row">
                                <div class="col-2 ms-auto mb-2">
                                    <button type="button" class="btn text-white rounded px-4 py-2 rounded-0" data-bs-toggle="modal" data-bs-target="#addSupplier" style="background-color:#0C25B6">Add Supplier</button>
                                </div>
                            </div>
                            <table id="supplierTable" class="table table-border text-center align-middle">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Address</th>
                                        <th class="text-center">Phone Number</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                <!-- MAIN CONTENT -->
            </div>
        <!-- MAIN CONTENT -->
    </div>

    <!-- JS -->
        <script src="{{ asset('/js/administrator/supplier.js') }}"></script>
        <script src="{{ asset('/js/logout.js') }}"></script>
        <script src="{{ asset('/js/sideBar.js') }}"></script>
        <script src="{{ asset('/js/dateTime.js') }}"></script>
    <!-- JS -->

    {{-- MODAL --}}
        {{-- ADD SUPPLIER --}}
            <div class="modal fade" id="addSupplier" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-10">
                                <h5 class="modal-title" id="staticBackdropLabel">NEW SUPPLIER</h5>
                            </div>
                            <div class="col-2">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                        </div>
                        <form id="addSupplierForm">
                        <div class="row my-3 px-1 g-2">
                            <div class="col-12 mb-3">
                                <label class="form-label">Name:</label>
                                <input type="text" name="fullname" class="form-control bg-body py-2" placeholder="Enter Name Here">
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Contact:</label>
                                <input type="text" name="contact" class="form-control bg-body py-2" placeholder="Enter Contact Here">
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Email:</label>
                                <input type="text" name="email" class="form-control bg-body py-2" placeholder="Enter Email Here">
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Address:</label>
                                <textarea class="form-control bg-body py-2" placeholder="Enter Address Here" style="resize: none; height: 100px;" name="address"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-10 ms-auto">
                                <button type="button" class="btn btn-secondary px-4 rounded-0" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn text-white px-4 rounded-0" style="background-color:#0C25B6">Submit</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        {{-- ADD SUPPLIER --}}

        {{-- UPDATE --}}
            <div class="modal fade" id="updateSupplierModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-10">
                                <h5 class="modal-title" id="staticBackdropLabel">UPDATE SUPPLIER</h5>
                            </div>
                            <div class="col-2">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                        </div>
                        <form id="updateSupplier">
                        <div class="row my-3 px-1 g-2">
                            <div class="col-12 mb-3">
                                <label class="form-label">Name:</label>
                                <input type="hidden" name="supp_id" id="supp_id">
                                <input type="text" name="fullname" id="fullname" class="form-control bg-body py-2" placeholder="Enter Name Here">
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Contact:</label>
                                <input type="text" name="contact" id="contact" class="form-control bg-body py-2" placeholder="Enter Contact Here">
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Email:</label>
                                <input type="text" name="email" id="email" class="form-control bg-body py-2" placeholder="Enter Email Here">
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Address:</label>
                                <textarea class="form-control bg-body py-2" placeholder="Enter Address Here" style="resize: none; height: 100px;" name="address" id="address"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-10 ms-auto">
                                <button type="button" class="btn btn-secondary px-4 rounded-0" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn text-white px-4 rounded-0" style="background-color:#0C25B6">Submit</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        {{-- UPDATE --}}
    {{-- MODAL --}}
</body>
</html>
