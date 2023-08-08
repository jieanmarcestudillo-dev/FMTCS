<?php

/*********************************THINGS TO DO STARTS HERE*******************************************

-Don't forget to revise the add products codes when it comes to the uploading of image on the addProduct Routes

**********************************THINGS TO DO ENDS HERE*********************************************/

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('dashboard', function () {
    return view('dashboard');
});


Route::get('viewProducts', [Controller::class,'viewProducts'])->name('viewProducts');
Route::get('viewCart', [Controller::class,'viewCart'])->name('viewCart');
Route::get('/products/getAll', [ProductController::class, 'getAllProductsForUser']);
Route::get('/products/getSorted', [ProductController::class, 'getSortedProducts']);
Route::get('/products/getDetailsById', [ProductController::class, 'getProductsById']);
Route::get('/products/getTopSales', [OrderDetailController::class, 'getTopSales']);
Route::get('/products/getProduct', [ProductController::class, 'getProduct']);
Route::get('/products/getByCategory', [ProductController::class, 'getProductByCategory']);
Route::get('/order/processOrder', [OrderController::class, 'processOrder']);
Route::get('/order/onlinePayment', [OrderController::class, 'processOnlinePayment']);
Route::get('category/getAll', [CategoryController::class, 'getCategories']);
Route::get('/checkAuthenticated', [ProfileController::class, 'check_authenticated']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

# STARTS HERE ADMIN ROUTES

Route::middleware(['auth','verified'])->group(function () {
    Route::get('adminDashboard', [Controller::class,'adminDashboard'])->name('adminDashboard');
    Route::get('adminNewOrders', [Controller::class,'adminNewOrders'])->name('adminNewOrders');
    Route::get('adminOrderDetails', [Controller::class,'adminOrderDetails'])->name('adminOrderDetails');
    Route::get('adminProductCategories', [Controller::class,'adminProductCategories'])->name('adminProductCategories');
    Route::get('adminSupplier', [Controller::class,'adminSupplier'])->name('adminSupplier');
    Route::get('adminViewProducts', [Controller::class,'adminViewProducts'])->name('adminViewProducts');
    Route::get('adminManageCustomers', [Controller::class,'adminManageCustomers'])->name('adminManageCustomers');
    Route::get('adminToShip', [Controller::class,'adminToShip'])->name('adminToShip');
    Route::get('adminToReceived', [Controller::class,'adminToReceived'])->name('adminToReceived');
    Route::get('adminCompletedOrders', [Controller::class,'adminCompletedOrders'])->name('adminCompletedOrders');
    Route::get('userLogout', [Controller::class,'userLogout'])->name('userLogout');
    Route::get('orderDetails/{id}', [OrderController::class,'orderDetails']);
});

# ENDS HERE ADMIN ROUTES






require __DIR__.'/auth.php';
