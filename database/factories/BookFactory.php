<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'author' => $this->faker->name,
            'description' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl(),
            'publisher' => $this->faker->name,
            'publication_year' => $this->faker->year,
            'category' => $this->faker->numberBetween(1, 10),
            'stock' => $this->faker->numberBetween(1, 100),
        ];
    }
}
