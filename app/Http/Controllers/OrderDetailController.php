<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function getAllOrderDetails(){
        $result = OrderDetail::all();
        return response()->json($result);
    }
}
