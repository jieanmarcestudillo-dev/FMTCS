<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CategoryController extends Controller
{
    public function getAllCategories(){
        $result = Category::all();

        if(!$result->isEmpty()){
            for($x = 0; $x < $result->count(); $x++){
                $data = '
                    <div class="d-">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editCategory">
                            <i class="bi bi-pencil-square" onclick="editCategory('.$result[$x]->cat_id.')></i>
                        </button>
                        <button class="btn btn-danger" onclick="deleteCategory('.$result[$x]->cat_id.')">
                            <i class="bi bi-trash3-fill"></i>
                        </button>
                    </div>
                ';
                $result[$x]->action = $data;
            }
        }

        return response()->json($result);
    }

    public function addCategory(Request $request){
        $category = new Category;

        $category->cat_name = $request->input('name');
        $category->cat_class = $request->input('class');

        $log = ' added ' . $request->input('name') . ' to the list of category';

        App::make(LogController::class)->addLogs($log);

        if($category->save()){
            return response()->json(['result' => 'success']);
        }else{
            return response()->json(['result' => 'failed']);
        }
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
         $category = Category::find($request->input('category_id'));

         $log = ' has deleted a category with an ID of ' . $request->input('category_id');

        App::make(LogController::class)->addLogs($log);

        if($category->delete()){
            return response()->json(['result' => 'success']);
        }else{
            return response()->json(['result' => 'failed']);
        }
    }

    public function getCategory(Request $request){
        $category = Category::find($request->input('category_id'));

        if($category){
            return response()->json([
                'name' => $category->cat_name,
                'class' => $category->cat_class,
                'id' => $category->cat_id
            ]);
        }
    }
}
