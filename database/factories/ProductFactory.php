<?php

namespace Database\Factories;

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
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph('5'),
            'department' => $this->faker->city(),
            'price'=>$this->faker->randomFloat(),
            'location'=>$this->faker->address(),
            'manufacture' =>$this->faker->city(),
            'tags' => 'perfumes, groceries, electronics'
        ];
    }
}
