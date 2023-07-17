<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ElectricityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number' => $this->faker->unique()->numerify('##########'),
            'name' => $this->faker->name(),
            'product_id' => $this->provideProductId()
        ];
    }
    
    public function provideProductId()
    {
        return Product::active()->get()->random()->id;
    }
}
