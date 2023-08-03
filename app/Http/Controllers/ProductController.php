<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getAllProducts(){
        $result = Products::all();

        if(!$result->isEmpty()){
            for($x = 0; $x < $result->count(); $x++){
                $data = '
                    <div class="d-">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editCategory">
                            <i class="bi bi-pencil-square" onclick="editProduct('.$result[$x]->prod_id.')></i>
                        </button>
                        <button class="btn btn-danger" onclick="deleteProduct('.$result[$x]->prod_id.')">
                            <i class="bi bi-trash3-fill"></i>
                        </button>
                    </div>
                ';
                $result[$x]->action = $data;
            }
        }

        return response()->json($result);
    }

    public function addProduct(Request $request){
        $product = new Products;

        $product->prod_name = $request->input('name');
        $product->prod_desc = $request->input('description');
        $product->prod_qty = $request->input('qty');
        $product->prod_cost = $request->input('cost');
        $product->prod_price = $request->input('price');
        $product->category = $request->input('category');
        $product->supplier = $request->input('supplier');
        $product->prod_serial = $request->input('serial');
        $product->prod_pic = $request->input('pic');

        $log = ' added ' . $request->input('name') . ' to the list of products';

        App::make(LogController::class)->addLogs($log);

        if($product->save()){
            return response()->json(['result' => 'success']);
        }else{
            return response()->json(['result' => 'failed']);
        }
    }

    public function updateProduct(Request $request){
        $product = Products::find($request->input('product_id'));

        $product->prod_name = $request->input('name');
        $product->prod_desc = $request->input('description');
        $product->prod_qty = $request->input('qty');
        $product->prod_cost = $request->input('cost');
        $product->prod_price = $request->input('price');
        $product->category = $request->input('category');
        $product->supplier = $request->input('supplier');
        $product->prod_serial = $request->input('serial');
        $product->prod_pic = $request->input('pic');

        $log = ' has updated product ' . $product->prod_name . ' details';

        App::make(LogController::class)->addLogs($log);

        if($product->save()){
            return response()->json(['result' => 'success']);
        }else{
            return response()->json(['result' => 'failed']);
        }
    }

    public function deleteProduct(Request $request){
        $product = Products::find($request->input('product_id'));

        $log = ' has deleted a product with an ID of ' . $request->input('product_id');

        App::make(LogController::class)->addLogs($log);

        if($product->delete()){
            return response()->json(['result' => 'success']);
        }else{
            return response()->json(['result' => 'failed']);
        }
    }

    public function getProduct(Request $request){
        $product = Products::find($request->input('product_id'));

        if($product){
            return response()->json($product);
        }
    }
}
