<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // TOTAL PRODUCT
        public function totalProducts(Request $request){
            $data = Products::all()->count();
            return response()->json($data != '' ? $data : '0');
        }
    // TOTAL PRODUCT

    // TOTAL PRODUCT SOLD
        public function totalProductsSold(Request $request){
            $data = OrderDetail::all()->count();
            return response()->json($data != '' ? $data : '0');
        }
    // TOTAL PRODUCT SOLD

    public function totalSales(Request $request){
        $data = OrderDetail::sum('price');
        return response()->json($data != '' ? '₱'.$data.'.00' : '0');
    }
}
