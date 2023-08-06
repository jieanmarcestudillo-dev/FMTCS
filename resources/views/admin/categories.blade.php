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
                            <h4 class="text-uppercase">PRODUCT CATEGORIES</h4>
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
                    <div class="mainBar container-fluid ms-4">
                        <div class="row">
                            <div class="col-11 ms-3 text-end">
                                <button type="button" class="btn rounded-0 text-white rounded px-4 py-2" data-bs-toggle="modal" data-bs-target="#addCategory" style="background-color:#0C25B6">Add Category</button>
                            </div>
                        </div>
                        <div class="row g-0" id="getAllCategories"></div>
                    </div>
                <!-- MAIN CONTENT -->

                {{-- MODAL --}}
                    {{-- NEW MODAL --}}
                        <div class="modal fade" id="addCategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">NEW CATEGORY</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form id="addCategoryForm">
                                    <div class="modal-body">
                                        <div class="input-group input-group-lg">
                                            <input required type="file" name="categoryPhotos" class="form-control rounded-0 py-3 text-center" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                                        </div>
                                        <div class="input-group input-group-lg mt-2">
                                            <input required type="text" name="categoryName" class="form-control rounded-0 py-3 text-center" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn rounded-0 btn-secondary rounded px-4" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn rounded-0 text-white rounded px-4" style="background-color:#0C25B6">Submit</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                    {{-- NEW MODAL --}}

                    {{-- UPDATE MODAL --}}
                        <div class="modal fade" id="showCategoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">UPDATE CATEGORY</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form id="updateCategoryForm">
                                    <div class="modal-body">
                                        <div class="text-center">
                                            <img src="" id="catPhotos" class="img-thumbnail border-0" style="height:10rem;">
                                        </div>
                                        <div class="mb-3">
                                            <label for="floatingTextarea2">Image</label>
                                            <input required type="hidden" name="cat_id" id="cat_id">
                                            <input required type="file" name="categoryPhotos" id="categoryPhotos" class="form-control rounded-0 py-3 text-center" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                                        </div>
                                        <div class="mb-3 mt-2">
                                            <label for="floatingTextarea2">Name</label>
                                            <input required type="text" name="categoryName" id="categoryName" class="form-control rounded-0 py-3 text-center" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn rounded-0 btn-secondary rounded px-4" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn rounded-0 text-white rounded px-4" style="background-color:#0C25B6">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                    {{-- UPDATE MODAL --}}
                {{-- MODAL --}}
            </div>
        <!-- MAIN CONTENT -->
    </div>

    <!-- JS -->
        <script src="{{ asset('/js/administrator/category.js') }}"></script>
        <script src="{{ asset('/js/logout.js') }}"></script>
        <script src="{{ asset('/js/sideBar.js') }}"></script>
        <script src="{{ asset('/js/dateTime.js') }}"></script>
    <!-- JS -->
</body>
</html>
