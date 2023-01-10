<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Penjualan;
use App\Models\Penjualan_Detail;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanTableSeeder extends Seeder
{
    protected $users;
    protected $supplier;
    protected $qty;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($ins = 1; $ins <= 100; $ins++) {
            $this->users = User::all()->pluck('id')->toArray();
            $this->qty = rand(1, 10);

            Penjualan::create([
                'user_id' => shuffle($this->users),
                'total_item' => $this->qty,
                'diskon' => 0,
                'total_bayar' => 0,
                'diterima' => 0,
            ]);

            $penjualanId = DB::getPdo()->lastInsertId();
            $getPembelian = Penjualan::where("id", $penjualanId)->firstOrfail();

            $total_harga = 0;
            $total_item = 0;
            for ($an = 1; $an <= $this->qty; $an++) {
                $barang = Barang::inRandomOrder()->first();
                $qtybarang = rand(1, 10);

                if ($barang->stok < $qtybarang) {
                    continue;
                }

                $total_item++;

                Penjualan_Detail::create([
                    'user_id' => $getPembelian->user_id,
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
                "total_item" => $total_item,
                'total_bayar' => $total_harga,
                'diterima' => $total_harga,
            ));
            //
        }
    }
}
