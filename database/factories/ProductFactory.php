<?php

namespace Database\Factories;
use App\Models\Maker;
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
        $colors = [
            'red/white', 'blue/white', 'green/white', 'yellow/white', 'purple/white',
            'orange/white', 'pink/white', 'brown/white', 'black/white', 'gray/white',
            'cyan/white', 'magenta/white', 'lime/white', 'maroon/white', 'navy/white',
            'olive/white', 'teal/white', 'aqua/white', 'fuchsia/white', 'silver/white',
            'gold/white', 'coral/white', 'indigo/white', 'ivory/white', 'khaki/white',
            'lavender/white', 'plum/white', 'salmon/white', 'tan/white', 'turquoise/white'
        ];

        return [
            'maker_id' => Maker::factory(),
            'product_name' => fake()->word(),
            'description' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 10, 1000),
            'image' => 'https://placehold.co/' . fake()->numberBetween(640, 1024) . 'x' . fake()->numberBetween(480, 768) . '/' . fake()->randomElement($colors),
        ];
    }
}
