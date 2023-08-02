<?php

namespace App\Http\Controllers;

use App\Models\Logs;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function getAllLogs(){
        $result = Logs::all();
        return response()->json($result);
    }
}
