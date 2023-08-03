<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getAllOrders(){
        $result = Orders::all();

        if(!$result->isEmpty()){
            for($x = 0; $x < $result->count(); $x++){
                $data = '
                    <div class="d-">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editCategory">
                            <i class="bi bi-pencil-square" onclick="editOrder('.$result[$x]->order_id.')></i>
                        </button>
                    </div>
                ';
                $result[$x]->action = $data;
            }
        }

        return response()->json($result);
    }

    #functionality not done yet
    public function addOrder(Request $request){
        $order = new Suppliers;

        $order->supp_name = $request->input('name');
        $order->supp_address = $request->input('address');
        $order->supp_contact = $request->input('contact');
        $order->supp_email = $request->input('email');

        $log = ' added ' . $request->input('name') . ' to the list of suppliers';

        App::make(LogController::class)->addLogs($log);

        if($order->save()){
            return response()->json(['result' => 'success']);
        }else{
            return response()->json(['result' => 'failed']);
        }
    }

    public function updateOrder(Request $request){
        $order = Orders::find($request->input('order_id'));

        $order->status = $request->input('status');;

        $log = ' has set ' . $order->track_num . ' status to ' $request->input('status');

        App::make(LogController::class)->addLogs($log);

        if($order->save()){
            return response()->json(['result' => 'success']);
        }else{
            return response()->json(['result' => 'failed']);
        }
    }

    #not functional yet
    public function getOrder(Request $request){
        $order = Suppliers::find($request->input('supplier_id'));

        if($order){
            return response()->json([
                'name' => $order->supp_name,
                'address' => $order->supp_address,
                'contact' => $order->supp_contact,
                'email' => $order->supp_email,
                'id' => $order->supp_id
            ]);
        }
    }
}
