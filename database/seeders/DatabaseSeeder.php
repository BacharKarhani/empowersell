<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash; 

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Roles
        Role::insert([
            ['role_name' => 'admin'],
            ['role_name' => 'vendor'],
            ['role_name' => 'customer'],
        ]);

        // Categories
        Category::factory()->count(10)->create();

        // Users
        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role_id' => 1, // admin
            'password' => Hash::make('password'), // Set password for admin
        ]);

        // Create 4 users with role_id 2 (vendor)
        $vendors = User::factory()->count(4)->create([
            'role_id' => 2, // vendor
            'password' => Hash::make('password'), // Set password for vendors
        ]);

        // Create 4 users with role_id 3 (customer)
        $customers = User::factory()->count(4)->create([
            'role_id' => 3, // customer
            'password' => Hash::make('password'), // Set password for customers
        ]);

        // Assign products and reviews to users
        $this->assignProductsAndReviews($admin);
        foreach ($vendors as $vendor) {
            $this->assignProductsAndReviews($vendor);
        }
        foreach ($customers as $customer) {
            $this->assignProductsAndReviews($customer);
        }
    }

    // Assign products and reviews to a user
    private function assignProductsAndReviews($user)
    {
        $products = Product::inRandomOrder()->limit(5)->get();
        foreach ($products as $product) {
            // Assign the product to the user
            $product->user_id = $user->id;
            $product->save();

            // Create a review for the product and assign it to the user
            $review = Review::factory()->make();
            $review->user_id = $user->id;
            $review->product_id = $product->id;
            $review->save();

            // Attach the product to the user's products (assuming a many-to-many relationship)
            $user->products()->attach($product);
        }
    }
}
