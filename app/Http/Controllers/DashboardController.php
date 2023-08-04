<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // TOTAL PRODUCT
        public function totalProducts(Request $request){
            $data = Products::all()->count();
            return response()->json($data != '' ? $data : '0');
        }
    // TOTAL PRODUCT
}
