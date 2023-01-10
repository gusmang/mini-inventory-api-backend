<?php

namespace Database\Factories;

use App\Models\Kategori;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class KategoriFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kategori::class;
    protected $users;
    protected $cat_array;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->users = User::all()->pluck('id')->toArray();
        $this->cat_array = array("Makanan", "Minuman", "Rokok", "Detergen", "Baju", "Snack", "Aksesoris", "Alat-Tulis", "Jam", "Celana");
        return [
            'user_id' => $this->faker->randomElement($this->users),
            'nama_kategori' => $this->cat_array[rand(0, 9)] . " ( " . Str::random(10) . " ) "
        ];
    }
}
