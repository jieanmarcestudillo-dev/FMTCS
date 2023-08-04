<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// ADMIN API
    // ORDERS PAGE
        Route::get('getNewOrders', [OrderController::class,'getNewOrders']);
        Route::get('getToShipOrders', [OrderController::class,'getToShipOrders']);
        Route::get('getToReceivedOrders', [OrderController::class,'getToReceivedOrders']);
        Route::get('getCompletedOrders', [OrderController::class,'getCompletedOrders']);
    // ORDERS PAGE

    // CATEGORY PAGE
        Route::get('getAllCategories', [CategoryController::class,'getAllCategories']);
        Route::post('addCategory', [CategoryController::class,'addCategory']);
        Route::post('deleteCategory', [CategoryController::class,'deleteCategory']);
        Route::get('showCategory', [CategoryController::class,'showCategory']);
    // CATEGORY PAGE

    // CUSTOMER PAGE
        Route::get('getAllCustomers', [CustomerController::class,'getAllCustomers']);
    // CUSTOMER PAGE

    // DASHBOARD PAGE
        Route::get('totalSales', [DashboardController::class,'totalSales']);
        Route::get('totalProductsSold', [DashboardController::class,'totalProductsSold']);
        Route::get('totalProducts', [DashboardController::class,'totalProducts']);
    // DASHBOARD PAGE
// ADMIN API

