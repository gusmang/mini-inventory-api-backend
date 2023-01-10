<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            UsersTableSeeder::class,
            KategoriTableSeeder::class,
            SupplierTableSeeder::class,
            BarangTableSeeder::class,
            PembelianTableSeeder::class,
            PenjualanTableSeeder::class
        ]);
    }
}
