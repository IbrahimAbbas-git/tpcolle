<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
 */
class TacheFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'titre' => $this->faker->realText(30),
        'detail' => $this->faker->paragraph(),
        
        // CORRECTION : Génère aléatoirement true ou false en base de données
        'etat' => $this->faker->boolean(), 
        
        // Tes priorités textuelles (qui restent des enums)
        'priorite' => $this->faker->randomElement([
            'top priority', 
            'very high priority', 
            'high priority', 
            'normal priority', 
            'low priority'
        ]),
        'user_id' => \App\Models\User::factory(),
        'projet_id' => \App\Models\Projet::factory(),
    ];
}
}
