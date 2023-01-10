<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class SupplierController extends Controller
{
    //
    public function getSupplier(Request $request)
    {
        $datacat = Supplier::where('deleted_at', NULL)->orderBy("id", "desc")->paginate(10);

        return response()->json(["data" => $datacat, "status" => 200]);
    }

    public function addSupplier(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|unique:suppliers|max:255',
            'email' => 'required|unique:suppliers|max:255',
            'alamat' => 'required|max:255',
            'telepon' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        };

        $dataInput = $request->all();

        $user_id = Auth::user()->id;
        $dataInput["user_id"] = $user_id;

        $ins = Supplier::create($dataInput);

        if ($ins) {
            return response()->json(['message' =>  "Input Data Supplier Berhasil", "status" => 200], 200);
        } else {
            return response()->json(['message' =>  "Input Data Supplier Gagal", "status" => 401], 401);
        }
    }

    public function updateSupplier(Request $request, $index)
    {
        $validator = Validator::make($request->all(), [
            'id' => "required",
            'nama' => 'required|max:255',
            'email' => 'max:255',
            'alamat' => 'required|max:255',
            'telepon' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        };

        $dataInput = $request->all();

        $user_id = Auth::user()->id;
        $dataInput["user_id"] = $user_id;

        $ins = Supplier::where("id", $index)->update($dataInput);

        if ($ins) {
            return response()->json(['message' =>  "Update Data Supplier Berhasil", "status" => 200], 200);
        } else {
            return response()->json(['message' =>  "Update Data Supplier Gagal", "status" => 401], 401);
        }
    }

    public function softDelete($id)
    {
        $supplier = Supplier::find($id);
        $del = $supplier->delete();

        if ($del) {
            return response()->json(['message' =>  "Delete Data Supplier Berhasil", "status" => 200], 200);
        } else {
            return response()->json(['message' =>  "Delete Data Supplier Gagal", "status" => 401], 401);
        }
    }
}
