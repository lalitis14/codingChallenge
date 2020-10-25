<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->unique()->numberBetween(2000,4500),
            'created_at' => $this->faker->date(),
            'nombre' => $this->faker->sentence(rand(2,4)),
            'descripcion' => $this->faker->sentence(10),
            'precio' => $this->faker->randomFloat(2,1,1500),
        ];
    }
}
