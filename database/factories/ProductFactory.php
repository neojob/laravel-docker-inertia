<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'title' => fake()->unique()->name(),
            'alias' => fake()->unique()->slug(),
            'desc' => fake()->unique()->text(500),
            'category_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ];
    }
}
