<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // GET ALL CUSTOMERS
        public function getAllCustomers(){
            return response()->json(User::where([['role', '=', 'USER']])->orderBy('created_at', 'DESC')->get());
        }
    // GET ALL CUSTOMERS
}
