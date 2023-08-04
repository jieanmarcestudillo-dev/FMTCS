<?php

namespace App\Http\Controllers;

use App\Models\Logs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    public function getAllLogs(){
        $result = Logs::all();
        return response()->json($result);
    }

    public function getLogs(){
        $result = Logs::where('id',Auth::user()->id)->get();
        return response()->json($result);
    }

    public function addLogs($value)
    {
        if (Auth::check()) {
            $logs = new Logs;
            $logs->user_id = Auth::user()->id;
            $logs->action = Auth::user()->name . $value;
            $logs->save();
        } else {
            echo Auth::user()->name;
        }
    }

}
