<?php

namespace Database\Factories;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BarangFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Barang::class;
    protected $users;
    protected $kategori;
    protected $harga_beli;
    protected $harga_jual;
    protected $prod_array;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->users = User::all()->pluck('id')->toArray();
        $this->kategori = Kategori::all()->pluck('id')->toArray();
        $this->prod_array = array("KFC", "Mixue", "Sampoerna", "Wings", "UniQlo", "Lays", "Casing Hp", "Pensil", "Jam Dinding", "Levis");
        $this->harga_beli = $this->faker->numberBetween(1000, 1000000);
        $this->harga_jual = $this->harga_beli + $this->faker->numberBetween(1000, 100000);

        return [
            'user_id' => $this->faker->randomElement($this->users),
            'id_kategori' => $this->faker->randomElement($this->kategori),
            'kode_produk' => "cat-" . Str::random(10),
            'nama_produk' => $this->prod_array[rand(0, 9)] . " ( " . Str::random(10) . " ) ",
            'foto_produk' => $this->prod_array[rand(0, 9)] . " ( " . Str::random(10) . " ) ",
            'harga_beli' => $this->harga_beli,
            'harga_jual' => $this->harga_jual,
            'stok' => $this->faker->numberBetween(0, 100),
        ];
    }
}
