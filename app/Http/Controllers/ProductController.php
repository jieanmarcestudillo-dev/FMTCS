<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getAllProducts(){
        $result = Products::all();
        return response()->json($result);
    }
}
