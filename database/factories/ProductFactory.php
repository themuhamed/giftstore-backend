<?php

namespace Database\Factories;

use App\Models\Category;
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
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->numberBetween(9, 499),
            'in_stock' => $this->faker->boolean(),
            'manufature_date' => $this->faker->date(),
            'main_image' => $this->faker->imageUrl('https://placehold.co/600x400'),
            'category_id' => Category::InRandomOrder()->first()->id,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
