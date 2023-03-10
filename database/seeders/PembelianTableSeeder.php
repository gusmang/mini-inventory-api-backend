<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Pembelian;
use App\Models\Pembelian_Detail;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PembelianTableSeeder extends Seeder
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
            $this->supplier = Supplier::all()->pluck('id')->toArray();
            $this->qty = rand(1, 10);

            Pembelian::create([
                'user_id' => shuffle($this->users),
                'id_supplier' => shuffle($this->supplier),
                'total_item' => $this->qty,
                'diskon' => 0,
                'total_bayar' => 0,
            ]);

            $pembelianId = DB::getPdo()->lastInsertId();
            $getPembelian = Pembelian::where("id", $pembelianId)->firstOrfail();

            $total_harga = 0;
            $total_item = 0;
            for ($an = 1; $an <= $this->qty; $an++) {
                $barang = Barang::inRandomOrder()->first();
                $qtybarang = rand(1, 10);

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
                "total_item" => $total_item,
                'total_bayar' => $total_harga,
            ));
            //
        }
    }
}
