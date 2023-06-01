<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class LangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'iso' => 'ru',
         ];
    }
}
