<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->word,
            'description' => $this->faker->sentence,
            'lien_image' => 'https://picsum.photos/200/300',
            'prix' => $this->faker->randomFloat(2, 1, 1000),
            'tva' => $this->faker->randomFloat(2, 0, 20),
        ];
    }
}
