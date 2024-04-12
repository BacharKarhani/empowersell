<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        $roleId = Arr::random([1, 2]); // Randomly choose between admin (1) and user (2)
    
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'), // You may want to use Hash facade instead of bcrypt()
            'gender' => $this->faker->randomElement(['male', 'female']),
            'address' => $this->faker->address,
            'profile_picture' => $this->faker->imageUrl(),
            'phone_number' => $this->faker->phoneNumber,
            'role_id' => $roleId,
        ];
    }
}
