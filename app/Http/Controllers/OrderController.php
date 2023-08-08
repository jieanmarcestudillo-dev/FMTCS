<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\OrderDetail;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
        ->join('users','orders.user_id', '=', 'users.id')->where('status','=','COMPLETED')->orderBy('orders.created_at', 'DESC')->get();
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

    public function orderDetails($id)
    {
        $order = Orders::select('orders.*','users.name','users.address','users.phone')
        ->join('users','orders.user_id', '=', 'users.id')->where('order_id', $id)->first();
        return view('admin.orderDetails', compact('order'));
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

}
