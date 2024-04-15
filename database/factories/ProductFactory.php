<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'product_name' => $this->faker->word,
            'product_picture' => $this->faker->imageUrl(),
            'product_price' => $this->faker->numberBetween(10, 1000),
            'product_description' => $this->faker->sentence,
            'category_id' => \App\Models\Category::factory(),
        ];
    }
}
