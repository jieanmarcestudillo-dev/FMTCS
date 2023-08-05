<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\Products;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function getAllOrderDetails(){
        $result = OrderDetail::all();
        return response()->json($result);
    }


    public function getTopSales(){
        $page = 10;
        $result = Products::select('products.*', 'category.cat_name', DB::raw('SUM(order_details.qty) as sum_qty'))
                    ->join('category', 'products.category', '=', 'category.cat_id')
                    ->join('order_details', 'order_details.prod_id', '=', 'products.prod_id')
                    ->groupBy('sum_qty')
                    ->get();

        return response()->json($result);
    }
}
