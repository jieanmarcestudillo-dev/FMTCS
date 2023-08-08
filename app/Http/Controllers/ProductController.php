<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use App\Models\Products;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getAllProducts(){
        $result = Products::select('products.*','category.cat_name','suppliers.supp_name')->join('category','products.category', '=','category.cat_id')
        ->join('suppliers','products.supplier', '=','suppliers.supp_id')->get();
        if($result->isNotEmpty()){
            foreach($result as $item){
                echo"
                    <div class='col-6'>
                        <div class='card mb-3 shadow bg-body' style='max-width: 540px; height: 300px;'>
                            <div class='row g-0'>
                            <div class='col-md-5 text-center p-3'>
                                <img src='$item->prod_pic' class='img-fluid rounded-start text-center' style='height: 100%; width:100%;'>
                            </div>
                            <div class='col-md-7'>
                                <div class='card-body lh-1'>
                                <p class='card-text text-muted'>Category: $item->cat_name</p>
                                <p class='card-text fw-bold fs-5'>$item->prod_name</p>
                                <p class='card-text lh-base'>$item->prod_desc</p>
                                <p class='card-text fw-bold' style='color:  #0C25B6;'>Price: Php $item->prod_price</p>
                                <p class='card-text'>Serial Number: $item->prod_serial</p>
                                <p class='card-text'>Available Stocks: $item->prod_qty Total</p>
                                <button type='button' onclick='updateProduct($item->prod_id)' style='background-color:#0C25B6' class='btn text-white rounded-0 btn-sm'>Update</button>
                                <button type='button' onclick='deleteProduct($item->prod_id)' style='background-color:#0C25B6' class='btn text-white rounded-0 btn-sm'>Remove</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                ";
            }
        }else{
            echo "
            <div class='row' style='margin-top:13rem; color: #0C25B6;'>
                <div class='alert alert-light text-center fs-4 fw-bold' role='alert' style='color: #0C25B6;'>
                    NO PRODUCT FOUND
                </div>
            </div>
            ";
        }
    }

    public function getSortedProducts(Request $request){
        $id = $request->input('id');

        if($id == 1){
            $result = Products::select('products.*','category.cat_name')
            ->join('category','products.category', '=','category.cat_id')
            ->where('products.prod_qty','>',0)
            ->orderBy('prod_price')
            ->get();
        }else if($id == 2){
            $result = Products::select('products.*','category.cat_name')
            ->join('category','products.category', '=','category.cat_id')
            ->where('products.prod_qty','>',0)
            ->orderBy('prod_price', 'DESC')
            ->get();
        }

        return response()->json($result);
    }

    public function addProduct(Request $request){
        // MARVIN BACKEND
            // $product = new Products;

            // $product->prod_name = $request->input('name');
            // $product->prod_desc = $request->input('description');
            // $product->prod_qty = $request->input('qty');
            // $product->prod_cost = $request->input('cost');
            // $product->prod_price = $request->input('price');
            // $product->category = $request->input('category');
            // $product->supplier = $request->input('supplier');
            // $product->prod_serial = $request->input('serial');
            // $product->prod_pic = $request->input('pic');

            // $log = ' added ' . $request->input('name') . ' to the list of products';

            // App::make(LogController::class)->addLogs($log);

            // if($product->save()){
            //     return response()->json(['result' => 'success']);
            // }else{
            //     return response()->json(['result' => 'failed']);
            // }
        // MARVIN BACKEND

        // NEW BACKEND
            $filename = $request->file('itemImage');
            $imageName = time().rand() . '.' .  $filename->getClientOriginalExtension();
            $path = $request->file('itemImage')->storeAs('item', $imageName, 'public');
            $imageData['itemImage'] = '/storage/'.$path;
            return response()->json(Products::create(
            ['prod_name' => $request->itemName,
                'prod_desc' => $request->itemDescription,
                'prod_qty' => $request->itemQty,
                'prod_cost' => $request->itemCost,
                'prod_price' => $request->itemPrice,
                'category' => $request->itemCategory,
                'supplier' => $request->itemSupplier,
                'prod_serial' => $request->itemSerialNumber,
                'prod_pic' => $imageData['itemImage'],
            ]) ? 1 : 0);
        // NEW BACKEND
    }

    public function searchProducts(Request $request){
        $result = Products::select('products.*','category.cat_name','suppliers.supp_name')->join('category','products.category', '=','category.cat_id')
        ->join('suppliers','products.supplier', '=','suppliers.supp_id')->where('products.prod_serial', 'like', $request->certainProduct)->get();
        if($result->isNotEmpty()){
            foreach($result as $item){
                echo"
                    <div class='col-6'>
                        <div class='card mb-3 shadow bg-body' style='max-width: 540px; height: 300px;'>
                            <div class='row g-0'>
                            <div class='col-md-5 text-center p-3'>
                                <img src='$item->prod_pic' class='img-fluid rounded-start text-center' style='height: 100%; width:100%;'>
                            </div>
                            <div class='col-md-7'>
                                <div class='card-body lh-1'>
                                <p class='card-text text-muted'>Category: $item->cat_name</p>
                                <p class='card-text fw-bold fs-5'>$item->prod_name</p>
                                <p class='card-text lh-base'>$item->prod_desc</p>
                                <p class='card-text fw-bold' style='color:  #0C25B6;'>Price: Php $item->prod_price</p>
                                <p class='card-text'>Serial Number: $item->prod_serial</p>
                                <p class='card-text'>Available Stocks: $item->prod_qty Total</p>
                                <button type='button' style='background-color:#0C25B6' class='btn text-white rounded-0 btn-sm'>Update</button>
                                <button type='button' style='background-color:#0C25B6' class='btn text-white rounded-0 btn-sm'>Remove</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                ";
            }
        }else{
            echo "
            <div class='row' style='margin-top:14rem; color: #0C25B6;'>
                <div class='bg-body text-center fs-4 fw-bold' role='alert' style='color: #0C25B6;'>
                    NO PRODUCT FOUND
                </div>
            </div>
            ";
        }
    }

    public function sortByCategory(Request $request){
        $result = Products::select('products.*','category.cat_name','suppliers.supp_name')->join('category','products.category', '=','category.cat_id')
        ->join('suppliers','products.supplier', '=','suppliers.supp_id')->where('products.category', 'like', $request->category)->get();
        if($result->isNotEmpty()){
            foreach($result as $item){
                echo"
                    <div class='col-6'>
                        <div class='card mb-3 shadow bg-body' style='max-width: 540px; height: 300px;'>
                            <div class='row g-0'>
                            <div class='col-md-5 text-center p-3'>
                                <img src='$item->prod_pic' class='img-fluid rounded-start text-center' style='height: 100%; width:100%;'>
                            </div>
                            <div class='col-md-7'>
                                <div class='card-body lh-1'>
                                <p class='card-text text-muted'>Category: $item->cat_name</p>
                                <p class='card-text fw-bold fs-5'>$item->prod_name</p>
                                <p class='card-text lh-base'>$item->prod_desc</p>
                                <p class='card-text fw-bold' style='color:  #0C25B6;'>Price: Php $item->prod_price</p>
                                <p class='card-text'>Serial Number: $item->prod_serial</p>
                                <p class='card-text'>Available Stocks: $item->prod_qty Total</p>
                                <button type='button' style='background-color:#0C25B6' class='btn text-white rounded-0 btn-sm'>Update</button>
                                <button type='button' style='background-color:#0C25B6' class='btn text-white rounded-0 btn-sm'>Remove</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                ";
            }
        }else{
            echo "
            <div class='row' style='margin-top:14rem; color: #0C25B6;'>
                <div class='bg-body text-center fs-4 fw-bold' role='alert' style='color: #0C25B6;'>
                    NO PRODUCT FOUND
                </div>
            </div>
            ";
        }
    }

    public function showProduct(Request $request){
        $result = Products::select('products.*','category.cat_name','suppliers.supp_name')->join('category','products.category', '=','category.cat_id')
        ->join('suppliers','products.supplier', '=','suppliers.supp_id')->where('products.prod_id', '=', $request->prod_id)->get();
        return response()->json($result);
    }

    public function updateProduct(Request $request){
        // MARVIN BACKEND
            // $product = Products::find($request->input('product_id'));
            // $product->prod_name = $request->input('name');
            // $product->prod_desc = $request->input('description');
            // $product->prod_qty = $request->input('qty');
            // $product->prod_cost = $request->input('cost');
            // $product->prod_price = $request->input('price');
            // $product->category = $request->input('category');
            // $product->supplier = $request->input('supplier');
            // $product->prod_serial = $request->input('serial');
            // $product->prod_pic = $request->input('pic');
            // $log = ' has updated product ' . $product->prod_name . ' details';
            // App::make(LogController::class)->addLogs($log);
            // if($product->save()){
            //     return response()->json(['result' => 'success']);
            // }else{
            //     return response()->json(['result' => 'failed']);
            // }
        // MARVIN BACKEND

        // NEW BACKEND
            if ($request->hasFile('itemImage')) {
                $filename = $request->file('itemImage');
                $imageName =   time().rand() . '.' .  $filename->getClientOriginalExtension();
                $path = $request->file('itemImage')->storeAs('item', $imageName, 'public');
                $imageData['itemImage'] = '/storage/'.$path;
                $updateCategory = Products::where('prod_id', '=' ,$request->prod_id)->update([
                    'prod_name' => $request->itemName,
                    'prod_desc' => $request->itemDescription,
                    'prod_qty' => $request->itemQty,
                    'prod_cost' => $request->itemCost,
                    'prod_price' => $request->itemPrice,
                    'category' => $request->itemCategory,
                    'supplier' => $request->itemSupplier,
                    'prod_serial' => $request->itemSerialNumber,
                    'prod_pic' =>  $imageData['itemImage'],
                ]);
                return response()->json($updateCategory ? 1 : 0);
            }else{
                $updateCategory = Products::where('prod_id', '=' ,$request->prod_id)->update([
                    'prod_name' => $request->itemName,
                    'prod_desc' => $request->itemDescription,
                    'prod_qty' => $request->itemQty,
                    'prod_cost' => $request->itemCost,
                    'prod_price' => $request->itemPrice,
                    'category' => $request->itemCategory,
                    'supplier' => $request->itemSupplier,
                    'prod_serial' => $request->itemSerialNumber,
                ]);
                return response()->json($updateCategory ? 1 : 0);
            }
        // NEW BACKEND
    }

    public function deleteProduct(Request $request){
        // MARVIN BACKEND
            // $product = Products::find($request->input('product_id'));

            // $log = ' has deleted a product with an ID of ' . $request->input('product_id');

            // App::make(LogController::class)->addLogs($log);

            // if($product->delete()){
            //     return response()->json(['result' => 'success']);
            // }else{
            //     return response()->json(['result' => 'failed']);
            // }
        // MARVIN BACKEND

        // NEW BACKEND
            return response()->json(Products::where([['prod_id', '=', $request->prod_id]])->delete() ? 1 : 0);
        // NEW BACKEND
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
            ->where('products.prod_qty','>',0)
            ->get();
        }else{
            $product = Products::select('products.*','category.cat_name')
            ->join('category','products.category', '=','category.cat_id')
            ->where('category.cat_id',$request->input('category_id'))
            ->where('products.prod_qty','>',0)
            ->get();
        }



        if($product){
            return response()->json($product);
        }
    }

    public function getAllCategory(Request $request){
        return response()->json(Category::all());
    }

    public function getProductsById(Request $request){

        $id = $request->input('id');

        $result = Products::select('products.*','category.cat_name')
                    ->join('category','products.category','=','category.cat_id')
                    ->where('products.prod_id',$id)
                    ->get();

        return response()->json($result);

    }

    public function getAllProductsForUser(){
        $result = Products::select('products.*','category.cat_name')
            ->join('category','products.category', '=','category.cat_id')
            ->where('products.prod_qty','>',0)
            ->get();
        return response()->json($result);
    }
}
