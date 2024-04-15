<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Category;
use App\Models\User;
use App\Models\Product;
use App\Models\Review;
use App\Models\UsersProduct; // Adjusted model import

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Seed roles
        Role::create(['role_name' => 'admin']);
        Role::create(['role_name' => 'vendor']);
        Role::create(['role_name' => 'customer']);

        // Create an admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'gender' => 'Male',
            'address' => 'Admin Address',
            'profile_picture' => 'admin.jpg',
            'phone_number' => '1234567890',
            'role_id' => 1, // admin
        ]);

        // Seed categories
        Category::factory()->count(10)->create();

        // Seed users
        $vendors = User::factory()->count(9)->create([
            'role_id' => 2, // vendor
        ]);

        $customers = User::factory()->count(9)->create([
            'role_id' => 3, // customer
        ]);

        // Seed products
        $products = Product::factory()->count(10)->create();

        // Seed reviews
        $reviews = Review::factory()->count(10)->create();

        // Assign users to products with random reviews
        foreach ($products as $product) {
            $vendor = $vendors->random();
            $customer = $customers->random();
            $review = $reviews->random();

            // Correct table name and model
            UsersProduct::create([
                'user_id' => $vendor->id,
                'product_id' => $product->id,
                'review_id' => $review->id,
            ]);

            UsersProduct::create([
                'user_id' => $customer->id,
                'product_id' => $product->id,
                'review_id' => $review->id,
            ]);
        }
    }
}
