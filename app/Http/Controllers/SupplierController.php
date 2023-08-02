<?php

namespace App\Http\Controllers;

use App\Models\Suppliers;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function getAllSuppliers(){
        $result = Suppliers::all();
        return response()->json($result);
    }
}
