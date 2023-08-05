<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use App\Models\Products;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getAllProducts(){
        $result = Products::select('products.*','category.cat_name')
            ->join('category','products.category', '=','category.cat_id')
            ->get();
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
        $product = Products::select('products.*','category.cat_name')
            ->join('category','products.category', '=','category.cat_id')
            ->where('prod_id',$request->input('product_id'))
            ->get();
            
        if($product){
            return response()->json($product);
        }
    }

    public function getProductByCategory(Request $request){

        if($request->input('category_id') == 0){
            $product = Products::select('products.*','category.cat_name')
            ->join('category','products.category', '=','category.cat_id')
            ->get();
        }else{
            $product = Products::select('products.*','category.cat_name')
            ->join('category','products.category', '=','category.cat_id')
            ->where('category.cat_id',$request->input('category_id'))
            ->get();
        }

        
            
        if($product){
            return response()->json($product);
        }
    }
}
