<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
{
    // 1. Créer 10 Utilisateurs
    $users = \App\Models\User::factory(10)->create();

    // 2. Créer 5 Projets
    $projets = \App\Models\Projet::factory(5)->create();

    // 3. Créer 30 Tâches liées aléatoirement à un utilisateur et un projet existant
    for ($i = 0; $i < 30; $i++) {
        \App\Models\Tache::factory()->create([
            'user_id' => $users->random()->id,
            'projet_id' => $projets->random()->idProjet,
        ]);
    }
}
}

