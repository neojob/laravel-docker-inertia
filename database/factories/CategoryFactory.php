<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    use HasFactory;
    public function definition()
    {
        return [
            'title' => fake()->unique()->name(),
            'alias' => fake()->unique()->slug(),
            'desc' => fake()->unique()->text(500),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ];
    }
}
