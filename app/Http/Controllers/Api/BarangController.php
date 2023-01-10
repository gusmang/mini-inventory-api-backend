<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Validator;

class BarangController extends Controller
{
    //
    public function getBarang(Request $request)
    {
        $dataprod = Barang::where('deleted_at', NULL)->orderBy("id", "desc")->paginate(10);

        return response()->json(["data" => $dataprod, "status" => 200]);
    }

    public function addBarang(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required|unique:barangs|max:255',
            'id_kategori' => 'required',
            'foto_produk' => 'required',
            'kode_produk' => 'required|unique:barangs|max:255',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        };

        $dataInput = $request->all();

        $file = $request->file('foto_produk');

        $extension = $file->getClientOriginalExtension();

        $foto_produk = date("YmdHis") . str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789") . "." . $extension;

        $file->storeAs('produk', $foto_produk);

        $img = \ImageUpload::make($file);
        // now you are able to resize the instance
        $img->resize(150, 150);

        //$img->save('produk/thumb/' . "thumb_" . $foto_produk);
        $path = Storage::path('produk/' . $foto_produk);
        //$store  = Storage::putFile('public/produk', new File($requestImagePath));
        Storage::putFileAs('produk/thumb', new File($path), 'thumb_' . $foto_produk);
        //Now delete temporary intervention image as we have moved it to Storage folder with Laravel filesystem.
        $img->destroy();

        $user_id = Auth::user()->id;

        $dataInput["foto_produk"] = $foto_produk;
        $dataInput["user_id"] = $user_id;

        $ins = Barang::create($dataInput);

        if ($ins) {
            return response()->json(['message' =>  "Input Data Barang Berhasil", "status" => 200], 200);
        } else {
            return response()->json(['message' =>  "Input Data Barang Gagal", "status" => 401], 401);
        }
    }

    public function updateBarang(Request $request, $index)
    {
        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required|max:255',
            'id_kategori' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        };

        $dataInput = $request->all();

        $file = $request->file('foto_produk');

        if (isset($file)) {
            $extension = $file->getClientOriginalExtension();
            $foto_produk = date("YmdHis") . str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789") . "." . $extension;
            $file->storeAs('produk', $foto_produk);
            $img = \ImageUpload::make($file);
            $img->resize(150, 150);
            $path = Storage::path('produk/' . $foto_produk);
            Storage::putFileAs('produk/thumb', new File($path), 'thumb_' . $foto_produk);
            $img->destroy();

            $dataInput["foto_produk"] = $foto_produk;
        }

        $user_id = Auth::user()->id;

        $dataInput["user_id"] = $user_id;

        $ins = Barang::where("id", $index)->update($dataInput);

        if ($ins) {
            return response()->json(['message' =>  "Update Data Barang Berhasil", "status" => 200], 200);
        } else {
            return response()->json(['message' =>  "Update Data Barang Gagal", "status" => 401], 401);
        }
    }

    public function softDelete($id)
    {
        $barang = Barang::find($id);
        $deleted = $barang->delete();

        if ($deleted) {
            return response()->json(['message' =>  "Delete Data Barang Berhasil", "status" => 200], 200);
        } else {
            return response()->json(['message' =>  "Delete Data Barang Gagal", "status" => 401], 401);
        }
    }
}
