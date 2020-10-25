<?php

namespace Database\Factories;

use App\Models\FacturaProducto;
use Illuminate\Database\Eloquent\Factories\Factory;

class FacturaProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FacturaProducto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->unique()->numberBetween(1,60),
            'id_factura' => $this->faker->numberBetween(1001,1015),
            'id_producto' => $this->faker->numberBetween(2000,4500),
            'cantidad' => $this->faker->numberBetween(1,10),
        ];
    }
}
