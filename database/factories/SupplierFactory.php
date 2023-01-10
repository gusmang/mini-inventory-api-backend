<?php

namespace Database\Factories;

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
    protected $model = Supplier::class;
    protected $users;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->users = User::all()->pluck('id')->toArray();
        return [
            'user_id' => $this->faker->randomElement($this->users),
            'nama' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'alamat' => Str::random(30),
            'telepon' => "+628" . rand("0123456789", 10),
        ];
    }
}
