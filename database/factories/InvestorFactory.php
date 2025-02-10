<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InvestorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'avatar' => "https://i.pravatar.cc/300?img=". (int) rand(1, 70) - 1,
            'full_name' => $this->faker->name(),
            'nickname' => $this->faker->unique()->userName(),
            'status' => $this->faker->randomElement(['active', 'disabled', 'pending']),
            'email' => $this->faker->unique()->safeEmail(),
            'bio' => $this->faker->paragraph(),
        ];
    }
}
