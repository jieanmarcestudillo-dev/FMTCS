<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    // HOME ROUTING
        public function viewProducts(){
            return view('viewProducts');
        }

        public function viewCart(){
            return view('viewCart');
        }
    // HOME ROUTING


    // ADMIN ROUTING

        // SIDE NAV ROUTING
            public function adminDashboard(){
                return view('admin.dashboard');
            }
            public function adminNewOrders(){
                return view('admin.newOrders');
            }
            public function adminOrderDetails(){
                return view('admin.orderDetails');
            }
            public function adminProductCategories(){
                return view('admin.categories');
            }
            public function adminViewProducts(){
                return view('admin.products');
            }
            public function adminManageCustomers(){
                return view('admin.manageCustomer');
            }
            public function adminSupplier(){
                return view('admin.supplier');
            }
        // SIDE NAV ROUTING

        // ORDERS ROUTING
            public function adminToShip(){
                return view('admin.toShip');
            }
            public function adminToReceived(){
                return view('admin.toReceived');
            }
            public function adminCompletedOrders(){
                return view('admin.completedOrders');
            }
        // ORDERS ROUTING
    // ADMIN ROUTING



    // USER LOGOUT
    public function userLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return response()->json(1);
    }
}


