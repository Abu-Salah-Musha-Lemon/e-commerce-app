<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
// use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;
    public function definition(): array
    {
        return [
            'product_name' => $this->faker->word(),
            'product_short_des' => $this->faker->sentence(),
            'product_des' => $this->faker->paragraph(),
            'product_price' => $this->faker->randomFloat(2, 10, 1000),
            'product_category_id' => $this->faker->numberBetween(1, 10),
            // 'product_category_name' => $this->faker->word(),
            'product_subcategory_id' => $this->faker->numberBetween(1, 20),
            // 'product_subcategory_name' => $this->faker->word(),
            'product_quantity' => $this->faker->numberBetween(1, 100),
            'product_img' => $this->faker->imageUrl(),
            'slug' => function (array $attributes) {
                return Str::slug($attributes['product_name']);
            },
        ];
    }
}
