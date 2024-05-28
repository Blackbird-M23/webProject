<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;


class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
{
    $types = ['Bakery', 'Sweets', 'Snacks'];
    
    return [
        'name' => $this->faker->word,
        'price' => $this->faker->randomFloat(2, 1, 1000), // Generate a random price between 1 and 1000 with 2 decimal places
        'description' => $this->faker->paragraph,
        'type' => $this->faker->randomElement($types),
    ];

}
}
