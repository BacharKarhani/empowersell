<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\Role;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Roles
        Role::insert([
            ['id' => 1, 'name' => 'admin'],
            ['id' => 2, 'name' => 'vendor'],
            ['id' => 3, 'name' => 'customer'],
        ]);

        // Categories
        Category::factory()->count(10)->create();

        // Reviews
        Review::factory()->count(20)->create();

        // Products
        Product::factory()->count(50)->create();

        // Users
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role_id' => 1, // admin
        ]);

        // Create 4 users with role_id 2 (vendor)
        User::factory()->count(4)->create([
            'role_id' => 2, // vendor
        ]);

        // Create 4 users with role_id 3 (customer)
        User::factory()->count(4)->create([
            'role_id' => 3, // customer
        ]);

    }
}
