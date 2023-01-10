<?php

namespace App\Http\Controllers\Api;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Http\Resources\PenjualanRes;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Penjualan_Detail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

class PenjualanController extends Controller
{
    //
    public function getPenjualan(Request $request)
    {
        $data = Penjualan::where('deleted_at', NULL)->orderBy("id", "desc")->paginate(10);

        return response()->json(["data" => PenjualanRes::collection($data), "status" => 200]);
    }

    public function addPenjualan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'diterima' => 'required',
            'total_item' => 'required',
            'diskon' => 'required',
            'total_bayar' => 'required',
            'item' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        };

        $dataInput = $request->all();

        $user_id = Auth::user()->id;
        $dataInput["user_id"] = $user_id;

        DB::beginTransaction();

        $ins = Penjualan::create($dataInput);

        $penjualanId = DB::getPdo()->lastInsertId();
        $getPenjualan = Penjualan::where("id", $penjualanId)->firstOrfail();

        $itemArr = json_encode($request->item);
        $item = json_decode($itemArr);

        $total_harga = 0;
        $total_item = 0;
        foreach ($item as $rowsbarang) {
            $barang = Barang::where("id", $rowsbarang->id_barang)->first();
            $qtybarang = $rowsbarang->qty;

            // jika stok barang di bawah qty penjualan out of stock maka barang tidak di input
            if ($barang->stok < $qtybarang) {
                continue;
            }

            $total_item++;

            Penjualan_Detail::create([
                'user_id' => $getPenjualan->user_id,
                'id_penjualan' => $penjualanId,
                'id_barang' => $barang->id,
                'nama_produk' => $barang->nama_produk,
                'harga_jual' => $barang->harga_jual,
                'qty' => $qtybarang,
                'sub_total' => $barang->harga_jual * $qtybarang,
            ]);

            Barang::where("id", $barang->id)->update(array(
                'stok' => $barang->stok - $qtybarang
            ));
            $total_harga += $barang->harga_jual * $qtybarang;
        }

        Penjualan::where("id", $penjualanId)->update(array(
            'total_item' => $total_item,
            'total_bayar' => $total_harga,
        ));

        DB::commit();

        if ($ins) {
            return response()->json(['message' =>  "Input Data Penjualan Berhasil", "status" => 200], 200);
        } else {
            return response()->json(['message' =>  "Input Data Penjualan Gagal", "status" => 401], 401);
        }
    }
}
