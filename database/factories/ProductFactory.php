<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'description' => $this->faker->name,
            'dimensions' => $this->faker->slug,
            'category_id'   => null,
            'code'  => $this->faker->postcode,
            'reference' => $this->faker->postcode,
            'stock' => $this->faker->numberBetween(0,150),
            'price' => $this->faker->numberBetween(1,300),
            'active' => $this->faker->boolean(50)

        ];
    }
}
