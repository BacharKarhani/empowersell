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
            ['id' => 2, 'name' => 'user'],
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

        User::factory()->count(9)->create([
            'role_id' => 2, // user
        ]);
    }
}
