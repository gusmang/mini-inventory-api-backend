<?php

namespace Database\Factories;

use App\Models\Barang;
use App\Models\Pembelian;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SupplierFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pembelian::class;
    protected $users;
    protected $supplier;
    protected $barang;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->users = User::all()->pluck('id')->toArray();
        $this->supplier = Supplier::all()->pluck('id')->toArray();
        $this->barang = Barang::all()->pluck('harga_beli')->toArray();

        return [
            'user_id' => $this->faker->randomElement($this->users),
            'id_supplier' => $this->faker->randomElement($this->supplier),
            'total_item' => $this->faker->unique()->safeEmail,
            'total_harga' => Str::random(30),
            'diskon' => 0,
            'total_bayar' => 0,
        ];
    }
}
