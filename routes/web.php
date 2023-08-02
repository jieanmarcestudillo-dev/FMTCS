<?php

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
});


Route::get('viewGearCategory', [Controller::class,'viewGearCategory'])->name('viewGearCategory');
Route::get('viewBoltsCategory', [Controller::class,'viewBoltsCategory'])->name('viewBoltsCategory');
Route::get('viewOtherCategory', [Controller::class,'viewOtherCategory'])->name('viewOtherCategory');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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
    Route::get('adminViewGear', [Controller::class,'adminViewGear'])->name('adminViewGear');
    Route::get('adminViewBolts', [Controller::class,'adminViewBolts'])->name('adminViewBolts');
    Route::get('adminViewOthers', [Controller::class,'adminViewOthers'])->name('adminViewOthers');
    Route::get('adminSalesReport', [Controller::class,'adminSalesReport'])->name('adminSalesReport');
    Route::get('userLogout', [Controller::class,'userLogout'])->name('userLogout');


    # --------------------------GET * data on the tables routes--------------------
    Route::get('getAllOrders', [OrderController::class,'getAllOrders']);
    Route::get('getAllOrderDetails', [OrderDetailController::class,'getAllOrderDetails']);
    Route::get('getAllCategory', [CategoryController::class,'getAllCategories']);
    Route::get('getAllLogs', [LogController::class,'getAllLogs']);
    Route::get('getAllProducts', [ProductController::class,'getAllProducts']);
    Route::get('getAllSuppliers', [SupplierController::class,'getAllSuppliers']);
});

# ENDS HERE ADMIN ROUTES






require __DIR__.'/auth.php';
