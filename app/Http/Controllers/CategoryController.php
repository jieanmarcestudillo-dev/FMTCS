<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Logs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function getAllCategories(){
        // MARVIN BACK EMD
            // $result = Category::all();
            // if(!$result->isEmpty()){
            //     for($x = 0; $x < $result->count(); $x++){
            //         $data = '
            //             <div class="d-">
            //                 <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editCategory">
            //                     <i class="bi bi-pencil-square" onclick="editCategory('.$result[$x]->cat_id.')></i>
            //                 </button>
            //                 <button class="btn btn-danger" onclick="deleteCategory('.$result[$x]->cat_id.')">
            //                     <i class="bi bi-trash3-fill"></i>
            //                 </button>
            //             </div>
            //         ';
            //         $result[$x]->action = $data;
            //     }
            // }
            // return response()->json($result);
        // MARVIN BACK EMD

        // NEW BACK END
            $categories = Category::all();
            if(Category::all()->isNotEmpty()){
                foreach(Category::all() as $item){
                    echo "
                        <div class='col-4 my-2'>
                            <div class='card shadow px-4 pt-3' style='width: 19rem; border-radius:20px;'>
                                <img src='$item->cat_photos' class='card-img-top' style='height: 13rem;'>
                                <div class='card-body'>
                                    <p class='card-text text-center mt-0 fs-4 fw-bolder text-uppercase'>$item->cat_name</p>
                                    <div class='row g-0 text-center'>
                                        <div class='col-6'>
                                            <button onclick='showCategory($item->cat_id)' type='button' style='background-color:#0C25B6' class='btn text-white rounded'>Update</button>
                                        </div>
                                        <div class='col-6'>
                                            <button onclick='deleteCategory($item->cat_id)' type='button' style='background-color:#0C25B6' class='btn text-white rounded'>Remove</button>
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
                        NO CATEGORY FOUND
                    </div>
                </div>
                ";
            }
        // NEW BACK END
    }

    public function addCategory(Request $request){
        // MARVIN BACKEND
            // $category = new Category;
            // $category->cat_name = $request->input('name');
            // $category->cat_class = $request->input('class');
            // $log = ' added ' . $request->input('name') . ' to the list of category';
            // App::make(LogController::class)->addLogs($log);
            // if($category->save()){
            //     return response()->json(['result' => 'success']);
            // }else{
            //     return response()->json(['result' => 'failed']);
            // }
        // MARVIN BACKEND

        // NEW BACK END
            $filename = $request->file('categoryPhotos');
            $imageName = time().rand() . '.' .  $filename->getClientOriginalExtension();
            $path = $request->file('categoryPhotos')->storeAs('category', $imageName, 'public');
            $imageData['categoryPhotos'] = '/storage/'.$path;
            return response()->json(Category::create(['cat_photos' => $imageData['categoryPhotos'],'cat_name' => $request->categoryName]) ? 1 : 0);
        // NEW BACK END
    }

    public function updateCategory(Request $request){
        $category = Category::find($request->input('category_id'));

        $category->cat_name = $request->input('name');
        $category->cat_class = $request->input('class');

        $log = ' has updated category ' . $category->cat_name . ' details';

        App::make(LogController::class)->addLogs($log);

        if($category->save()){
            return response()->json(['result' => 'success']);
        }else{
            return response()->json(['result' => 'failed']);
        }
    }

    public function deleteCategory(Request $request){
        // MARVIN BACKEND
            //  $category = Category::find($request->input('category_id'));

            //  $log = ' has deleted a category with an ID of ' . $request->input('category_id');

            // App::make(LogController::class)->addLogs($log);

            // if($category->delete()){
            //     return response()->json(['result' => 'success']);
            // }else{
            //     return response()->json(['result' => 'failed']);
            // }
        // MARVIN BACKEND

        // NEW BACK END
            return response()->json(Category::where([['cat_id', '=', $request->catId]])->delete() ? 1 : 0);
        // NEW BACK END
    }

    public function showCategory(Request $request){
        // MARVIN BACKEND
            // $category = Category::find($request->input('category_id'));
            // if($category){
            //     return response()->json([
            //         'name' => $category->cat_name,
            //         'class' => $category->cat_class,
            //         'id' => $category->cat_id
            //     ]);
            // }
        // MARVIN BACKEND

        // NEW BACK END
            return response()->json(Category::where([['cat_id', '=', $request->catId]])->get());
        // NEW BACK END
    }
}
