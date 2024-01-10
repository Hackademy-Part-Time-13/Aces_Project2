<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ad>
 */
class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoriesIds = Category::pluck('id')->toArray();
        $usersIds = User::pluck('id')->toArray();

        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'category_id' => fake()->randomElement($categoriesIds),
            'user_id' => fake()->randomElement($usersIds),
            'price' => fake()->randomFloat(2, 5, 100),
        ];
    }
}
