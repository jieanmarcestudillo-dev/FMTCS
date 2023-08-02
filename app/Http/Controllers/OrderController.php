<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getAllOrders(){
        $result = Orders::all();
        return response()->json($result);
    }
}
