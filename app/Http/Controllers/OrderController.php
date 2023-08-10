<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\OrderDetail;
use App\Models\Products;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Exports\completedOrders;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    // MARVIN BACK END
        // public function getAllOrders(){
        //     $result = Orders::all();

        //     if(!$result->isEmpty()){
        //         for($x = 0; $x < $result->count(); $x++){
        //             $data = '
        //                 <div class="d-">
        //                     <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editCategory">
        //                         <i class="bi bi-pencil-square" onclick="editOrder('.$result[$x]->order_id.')></i>
        //                     </button>
        //                 </div>
        //             ';
        //             $result[$x]->action = $data;
        //         }
        //     }

        //     return response()->json($result);
        // }

        // #functionality not done yet
        // public function addOrder(Request $request){
        //     $order = new Suppliers;

        //     $order->supp_name = $request->input('name');
        //     $order->supp_address = $request->input('address');
        //     $order->supp_contact = $request->input('contact');
        //     $order->supp_email = $request->input('email');

        //     $log = ' added ' . $request->input('name') . ' to the list of suppliers';

        //     App::make(LogController::class)->addLogs($log);

        //     if($order->save()){
        //         return response()->json(['result' => 'success']);
        //     }else{
        //         return response()->json(['result' => 'failed']);
        //     }
        // }

        // public function updateOrder(Request $request){
        //     $order = Orders::find($request->input('order_id'));

        //     $order->status = $request->input('status');;

        //     $log = ' has set ' . $order->track_num . ' status to ' $request->input('status');

        //     App::make(LogController::class)->addLogs($log);

        //     if($order->save()){
        //         return response()->json(['result' => 'success']);
        //     }else{
        //         return response()->json(['result' => 'failed']);
        //     }
        // }

        // #not functional yet
        // public function getOrder(Request $request){
        //     $order = Suppliers::find($request->input('supplier_id'));

        //     if($order){
        //         return response()->json([
        //             'name' => $order->supp_name,
        //             'address' => $order->supp_address,
        //             'contact' => $order->supp_contact,
        //             'email' => $order->supp_email,
        //             'id' => $order->supp_id
        //         ]);
        //     }
        // }
    // MARVIN BACK END

    public function getNewOrders(Request $request){
        $data = Orders::select('orders.*','users.name','users.phone')
        ->join('users','orders.user_id', '=', 'users.id')->where('status','=','PENDING')->orderBy('orders.created_at', 'DESC')->get();
        return response()->json($data);
    }

    public function getToShipOrders(Request $request){
        $data = Orders::select('orders.*','users.name','users.phone')
        ->join('users','orders.user_id', '=', 'users.id')->where('status','=','TO SHIP')->orderBy('orders.created_at', 'DESC')->get();
        return response()->json($data);
    }

    public function getToReceivedOrders(Request $request){
        $data = Orders::select('orders.*','users.name','users.phone')
        ->join('users','orders.user_id', '=', 'users.id')->where('status','=','TO RECEIVED')->orderBy('orders.created_at', 'DESC')->get();
        return response()->json($data);
    }

    public function getCompletedOrders(Request $request){
        $data = Orders::select('orders.*','users.name','users.phone')
        ->join('users','orders.user_id', '=', 'users.id')->where('status','=','COMPLETE')->orderBy('orders.created_at', 'DESC')->get();
        return response()->json($data);
    }

    public function processOrder(Request $request){

        $total = $request->input('total');
        $cart = json_decode($request->input('order'));

        $size = sizeof($cart);

        $orders = new Orders();

        $orders->user_id = Auth::user()->id;
        $orders->track_num = 'ORD' . Auth::user()->id . time();
        $orders->status = 'PENDING';
        $orders->total = $total;

        if($orders->save()){
            $id = $orders->id;

            for($x = 0; $x < $size; $x++){

                $products = Products::find($cart[$x]->item_id);

                if($products){
                    $products->prod_qty = intval($products->prod_qty) - intval($cart[$x]->item_qty);
                    $products->save();
                }

                $order_detail = new OrderDetail();
                $order_detail->detail_id = $id;
                $order_detail->prod_id = $cart[$x]->item_id;
                $order_detail->qty = $cart[$x]->item_qty;
                $order_detail->price = $cart[$x]->item_price;
                $order_detail->total = $cart[$x]->item_price * $cart[$x]->item_qty;
                $order_detail->save();


            }
            return response()->json([
                'message' => 'success'
            ]);
        }else{
            return response()->json([
                'message' => 'failed'
            ]);
        }
    }

    public function toShipOrders (Request $request){
        return response()->json(Orders::where('order_id', '=', $request->order_id)->update(['status' => 'TO SHIP']) ? 1 : 0);
    }

    public function toReceivedOrders (Request $request){
        return response()->json(Orders::where('order_id', '=', $request->order_id)->update(['status' => 'TO RECEIVED']) ? 1 : 0);
    }

    public function completeOrders (Request $request){
        return response()->json(Orders::where('order_id', '=', $request->order_id)->update(['status' => 'COMPLETE']) ? 1 : 0);
    }

    public function viewOrderDetails()
    {
        return view('admin.orderDetails');
    }

    public function getOrderDetails(Request $request){
      $order = OrderDetail::select('order_details.order_details_id','order_details.qty','order_details.price','order_details.total','products.prod_name',
      'products.prod_price','products.prod_pic')->join('products','products.prod_id', '=', 'order_details.prod_id')
       ->where('order_details.detail_id', $request->orderId)->get();
       $rowNumber = 0;
        foreach($order as $item){
            $rowNumber++;
            echo "
                <tr>
                    <td class='fw-bold text-muted'>$rowNumber</td>
                    <td><img class='img-fluid' style='height:80px;' src='$item->prod_pic'></td>
                    <td class='fw-bold text-muted' style='font-size:14px;'>$item->prod_name</td>
                    <td class='fw-bold text-muted' style='font-size:14px;'>Php $item->prod_price.00</td>
                    <td class='fw-bold text-muted' style='font-size:14px;'>$item->qty</td>
                    <td class='fw-bold text-muted' style='font-size:14px;'>Php $item->total.00</td>
                </tr>
            ";
        }
    }

    public function getOrderDetails2(Request $request){
      $order = OrderDetail::select('order_details.order_details_id','order_details.qty','order_details.price','order_details.total','products.prod_name',
      'products.prod_price','products.prod_pic')->join('products','products.prod_id', '=', 'order_details.prod_id')
       ->where('order_details.detail_id', $request->orderId)->get();
       $rowNumber = 0;
       $data = "";
       $total = 0;
        foreach($order as $item){
            $rowNumber++;
            $data .= "
                <tr>
                    <td class='fw-bold text-muted'>$rowNumber</td>
                    <td><img class='img-fluid' style='height:80px;' src='$item->prod_pic'></td>
                    <td class='fw-bold text-muted' style='font-size:14px;'>$item->prod_name</td>
                    <td class='fw-bold text-muted' style='font-size:14px;'>₱ ". number_format($item->prod_price) ."</td>
                    <td class='fw-bold text-muted' style='font-size:14px;'>$item->qty</td>
                    <td class='fw-bold text-muted' style='font-size:14px;'>₱ ".number_format($item->total)."</td>
                </tr>
            ";
            $total += $item->total;
        }

        return response()->json([
            'data' => $data,
            'total' => '₱ ' . number_format($total + 100)
        ]);
    }

    public function getCustomer(Request $request){
        $data = Orders::select('orders.created_at','users.name','users.address','users.phone')
        ->join('users','orders.user_id', '=', 'users.id')->where('orders.order_id', $request->orderId)->first();
        return response()->json($data);
    }

    public function getTotal(Request $request){
        $data = OrderDetail::where('detail_id', $request->orderId)->sum('price');
        $total = $data + 100;
        return response()->json('Php '.$total.'.00');
    }

    public function processOnlinePayment(Request $request){
        $amount = $request->input('total');
        $nonce = round(microtime(true) * 1000);
        $redirect_uri = 'http://127.0.0.1:8000/viewCart';

        //live account
        //$link = 'https://api.nextpay.world/v2/paymentlinks';
        //$secret = 'u7t4rlw251kqr1tdkziw6iqo';
        //$client_key = 'ck_rb1f8rpm5oyd68x39ochcatl';

        //sandbox account
        $link ='https://api-sandbox.nextpay.world/v2/paymentlinks';
        $secret = 'a8h27lno8icjwcdk3pyppi7a';
        $client_key = 'ck_sandbox_jg6hsrlhxudza4pfgprhga8l';


        $client = new \GuzzleHttp\Client();

        $data = [
            "title" => "FMTCS Industrial Corp.",
            "amount" => $amount,
            "currency" => "PHP",
            "description" => "Thank you for placing your trust in our services. We look forward to serving you again in the future. If you have any further questions or need assistance, please don't hesitate to reach out. We strive to make your experience with us perfect every time.",
            "private_notes" => "string",
            "limit" => 1,
            "redirect_url" => $redirect_uri,
            "nonce" => $nonce, // Generate a timestamp-based nonce
        ];

        $signature = hash_hmac('sha256', json_encode($data,JSON_UNESCAPED_SLASHES), $secret);

        $response = $client->request('POST', $link, [
          'body' => json_encode($data),
          'headers' => [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'client-id' => $client_key,
            'idempotency-key' => '',
            'signature' => $signature,
          ],
        ]);

        $responseBody = $response->getBody();

        return response($responseBody, 200)->header('Content-Type', 'application/json');
    }

    public function printCompletedOrders(Request $request){
        $order = Orders::select('orders.*','users.name','users.address','users.phone')
        ->join('users','orders.user_id', '=', 'users.id')->orderBy('orders.created_at' , 'DESC')->get();
        foreach($order as $item){
            $completedOrders = [
                'data' => $order
            ];
        }
        $pdf = PDF::loadView('pdf.printCompletedOrders', $completedOrders)->setPaper('A4', 'portrait');
        return $pdf->stream('Completed Orders.pdf');
    }

    public function excelCompletedOrders(Request $request){
        return Excel::download(new completedOrders, 'Completed Orders.xlsx');
    }


    public function printOrders(Request $request, $id){
        $customer = Orders::select('orders.created_at','users.name','users.address','users.phone')
        ->join('users','orders.user_id', '=', 'users.id')->where('orders.order_id', $id)->first();

        $order = OrderDetail::select('order_details.order_details_id','order_details.qty','order_details.price','order_details.total','products.prod_name',
        'products.prod_price','products.prod_pic')->join('products','products.prod_id', '=', 'order_details.prod_id')
        ->where('order_details.detail_id', $id)->get();

        $data = OrderDetail::where('detail_id', $id)->sum('price');
        $total = $data + 100;

        $pdf = PDF::loadView('pdf.printOrders',  ['customer' => $customer,'order' => $order,'total' => $total])->setPaper('A4', 'portrait');
        return $pdf->stream('Orders.pdf');
     }

    public function userOrder(){
        $id = Auth::user()->id;

        $order = Orders::select('orders.*','users.name')
                    ->join('users','users.id','=','orders.user_id')
                    ->where('orders.user_id','=',$id)
                    ->get();

        if($order->isNotEmpty()){
            foreach($order as $item){
               $item->action = '
                    <button type="button" data-title="Order Delivered?" onclick=orderDelivered('.$item->order_id.') class="btn rounded-0 btn-outline-success btn-sm py-2 px-3">
                        <i class="bi bi-truck"></i>
                    </button>
                    <a type="button" onclick=viewOrders('.$item->order_id.') data-title="View This Order?"  class="btn rounded-0 btn-outline-secondary btn-sm py-2 px-3">
                        <i class="bi bi-view-stacked"></i>
                    </a>';
               $item->amount = '₱ '. number_format($item->total);
               $item->date = date('M d, Y | g:i A', strtotime($item->created_at));
            }
        }

        return response()->json($order);
    }

}
