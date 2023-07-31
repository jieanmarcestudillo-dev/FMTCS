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
        public function viewGearCategory(){
            return view('viewGearCategory');
        }
        public function viewBoltsCategory(){
            return view('viewBoltsCategory');
        }
        public function viewOtherCategory(){
            return view('viewOtherCategory');
        }
        public function viewCart(){
            return view('viewCart');
        }
    // HOME ROUTING


    // ADMIN ROUTING
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
        public function adminViewGear(){
            return view('admin.gears');
        }
        public function adminViewBolts(){
            return view('admin.bolts');
        }
        public function adminViewOthers(){
            return view('admin.others');
        }
        public function adminSalesReport(){
            return view('admin.salesReport');
        }
    // ADMIN ROUTING


    // USER LOGOUT
    public function userLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect('/login');
    }
}
