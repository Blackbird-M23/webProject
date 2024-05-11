<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Product;


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
    $types = ['bakery', 'cake', 'snacks'];
    
    return [
        'name' => $this->faker->word,
        'price' => $this->faker->randomFloat(2, 1, 1000), // Generate a random price between 1 and 1000 with 2 decimal places
        'description' => $this->faker->paragraph,
        'type' => $this->faker->randomElement($types),
    ];

}
}
