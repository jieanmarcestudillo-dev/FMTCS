<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use App\Models\Suppliers;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function getAllSuppliers(){
        $result = Suppliers::all();

        if(!$result->isEmpty()){
            for($x = 0; $x < $result->count(); $x++){
                $data = '
                    <div class="d-">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editSupplier">
                            <i class="bi bi-pencil-square" onclick="editSupplier('.$result[$x]->supp_id.')"></i>
                        </button>
                        <button class="btn btn-danger" onclick="deleteSupplier('.$result[$x]->supp_id.')">
                            <i class="bi bi-trash3-fill"></i>
                        </button>
                    </div>
                ';
                $result[$x]->action = $data;
            }
        }

        return response()->json($result);
    }

    public function addSupplier(Request $request){
        $supplier = new Suppliers;

        $supplier->supp_name = $request->input('name');
        $supplier->supp_address = $request->input('address');
        $supplier->supp_contact = $request->input('contact');
        $supplier->supp_email = $request->input('email');

        $log = ' added ' . $request->input('name') . ' to the list of suppliers';

        App::make(LogController::class)->addLogs($log);

        if($supplier->save()){
            return response()->json(['result' => 'success']);
        }else{
            return response()->json(['result' => 'failed']);
        }
    }

    public function updateSupplier(Request $request){
        $supplier = Suppliers::find($request->input('supplier_id'));

        $supplier->supp_name = $request->input('name');
        $supplier->supp_address = $request->input('address');
        $supplier->supp_contact = $request->input('contact');
        $supplier->supp_email = $request->input('email');

        $log = ' has updated supplier ' . $supplier->supp_name . ' details';

        App::make(LogController::class)->addLogs($log);

        if($supplier->save()){
            return response()->json(['result' => 'success']);
        }else{
            return response()->json(['result' => 'failed']);
        }
    }

    public function deleteSupplier(Request $request){
        $supplier = Suppliers::find($request->input('supplier_id'));

        $log = ' has deleted a supplier with an ID of ' . $request->input('supplier_id');

        App::make(LogController::class)->addLogs($log);

        if($supplier->delete()){
            return response()->json(['result' => 'success']);
        }else{
            return response()->json(['result' => 'failed']);
        }
    }

    public function getSupplier(Request $request){
        $supplier = Suppliers::find($request->input('supplier_id'));

        if($supplier){
            return response()->json([
                'name' => $supplier->supp_name,
                'address' => $supplier->supp_address,
                'contact' => $supplier->supp_contact,
                'email' => $supplier->supp_email,
                'id' => $supplier->supp_id
            ]);
        }
    }
}
