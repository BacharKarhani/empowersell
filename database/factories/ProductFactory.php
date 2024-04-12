<?php

namespace Database\Factories;

use App\Models\review;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
{
    $categoryIds = Category::pluck('id')->toArray();
    $categoryId = empty($categoryIds) ? null : $this->faker->randomElement($categoryIds);

    // Randomly determine if the product has a review
    $hasReview = $this->faker->boolean(50); // Adjust the percentage as needed

    return [
        'product_name' => $this->faker->word,
        'product_picture' => $this->faker->imageUrl(),
        'product_price' => $this->faker->numberBetween(100, 1000),
        'product_description' => $this->faker->sentence,
        'review_id' => $hasReview ? Review::factory()->create()->id : null,
        'category_id' => $categoryId,
    ];
}
}