<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

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
}
