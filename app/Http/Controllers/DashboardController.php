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

    public function graph(Request $request){
        $monthNames = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];

        $orders = OrderDetail::selectRaw('DATE_FORMAT(created_at, "%M") as monthName,  SUM(price) as totalSales')
            ->groupBy('monthName')->orderByRaw('MONTH(created_at)')->get()->keyBy('monthName')->map(fn($data) => $data->totalSales)->toArray();

        $formattedOrders = array_replace(array_fill_keys($monthNames, 0), $orders);

        $response = ['months' => $monthNames,'sales' => array_values($formattedOrders),];

        return response()->json($response);

    }
}
