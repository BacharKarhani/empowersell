<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password'), // Default password is 'password'
            'gender' => $this->faker->randomElement(['male', 'female']),
            'address' => $this->faker->address,
            'profile_picture' => $this->faker->imageUrl(),
            'phone_number' => $this->faker->phoneNumber,
            'role_id' => \App\Models\Role::factory(),
        ];
    }
}
