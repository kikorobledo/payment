<?php

namespace Database\Factories;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'title' => $this->faker->word(),
            'image' => $this->faker->imageUrl(640, 480),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomElement([19, 49 ,99])
        ];
    }
}
