<?php

namespace App\Http\Controllers\Api;

use App\Models\Pembelian;
use Illuminate\Http\Request;
use App\Http\Resources\PembelianRes;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Pembelian_Detail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

class PembelianController extends Controller
{
    //
    public function getPembelian(Request $request)
    {
        $data = Pembelian::where('deleted_at', NULL)->orderBy("id", "desc")->paginate(10);

        return response()->json(["data" => PembelianRes::collection($data), "status" => 200]);
    }

    public function addPembelian(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_supplier' => 'required',
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

        $ins = Pembelian::create($dataInput);

        $pembelianId = DB::getPdo()->lastInsertId();
        $getPembelian = Pembelian::where("id", $pembelianId)->firstOrfail();

        $itemArr = json_encode($request->item);
        $item = json_decode($itemArr);

        $total_harga = 0;
        $total_item = 0;
        foreach ($item as $rowsbarang) {
            $barang = Barang::where("id", $rowsbarang->id_barang)->first();
            $qtybarang = $rowsbarang->qty;

            $total_item++;

            Pembelian_Detail::create([
                'user_id' => $getPembelian->user_id,
                'id_pembelian' => $pembelianId,
                'id_barang' => $barang->id,
                'nama_produk' => $barang->nama_produk,
                'harga_beli' => $barang->harga_beli,
                'qty' => $qtybarang,
                'sub_total' => $barang->harga_beli * $qtybarang,
            ]);

            Barang::where("id", $barang->id)->update(array(
                'stok' => $barang->stok + $qtybarang
            ));
            $total_harga += $barang->harga_beli * $qtybarang;
        }

        Pembelian::where("id", $pembelianId)->update(array(
            'total_item' => $total_item,
            'total_bayar' => $total_harga,
        ));

        DB::commit();

        if ($ins) {
            return response()->json(['message' =>  "Input Data Pembelian Berhasil", "status" => 200], 200);
        } else {
            return response()->json(['message' =>  "Input Data Pembelian Gagal", "status" => 401], 401);
        }
    }
}
