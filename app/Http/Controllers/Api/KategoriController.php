<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class KategoriController extends Controller
{
    //
    public function getkategori(Request $request)
    {
        $datacat = Kategori::where('deleted_at', NULL)->orderBy("id", "desc")->paginate(10);

        return response()->json(["data" => $datacat, "status" => 200]);
    }

    public function addKategori(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required|unique:kategoris|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        };

        $dataInput = $request->all();

        $user_id = Auth::user()->id;
        $dataInput["user_id"] = $user_id;

        $ins = Kategori::create($dataInput);

        if ($ins) {
            return response()->json(['message' =>  "Input Data Kategori Berhasil", "status" => 200], 200);
        } else {
            return response()->json(['message' =>  "Input Data Kategori Gagal", "status" => 401], 401);
        }
    }

    public function updateKategori(Request $request, $index)
    {
        $validator = Validator::make($request->all(), [
            'id' => "required",
            'nama_kategori' => 'required|unique:kategoris|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        };

        $dataInput = $request->all();

        $user_id = Auth::user()->id;
        $dataInput["user_id"] = $user_id;

        $ins = Kategori::where("id", $index)->update($dataInput);

        if ($ins) {
            return response()->json(['message' =>  "Update Data Kategori Berhasil", "status" => 200], 200);
        } else {
            return response()->json(['message' =>  "Update Data Kategori Gagal", "status" => 401], 401);
        }
    }

    public function softDelete($id)
    {
        $kategori = Kategori::find($id);
        $delcat = $kategori->delete();

        if ($delcat) {
            return response()->json(['message' =>  "Delete Data Kategori Berhasil", "status" => 200], 200);
        } else {
            return response()->json(['message' =>  "Delete Data Kategori Gagal", "status" => 401], 401);
        }
    }
}
