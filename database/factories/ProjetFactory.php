<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
 */
class ProjetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'nomProjet' => $this->faker->sentence(3),
        'dateDebut' => $this->faker->date(),
        'dateFin' => $this->faker->optional()->date(),
        'lienGithub' => 'https://github.com/' . $this->faker->userName . '/' . $this->faker->slug,
    ];
}
}
