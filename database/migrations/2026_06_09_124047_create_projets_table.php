<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::create('taches', function (Blueprint $table) {
        // idTache comme clé primaire
        $table->id('idTache');
        
        $table->string('titre', 100);
        $table->text('detail')->nullable(); // text permet de mettre une longue description
        $table->boolean('etat', 50)->default(false); // Ex: En attente, En cours, Terminé
        $table->enum('priorite', ['top priority', 'very high priority','high priority','normal priority','low priority'])->default('very high priority');        
        // --- RELATIONS 1 TO MANY (Clés Étrangères) ---
        
        // 1. Liaison vers la table 'users' de Laravel (clé locale 'user_id' pointe sur 'id' de 'users')
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        
        // 2. Liaison vers ta table 'projets' (clé locale 'projet_id' pointe sur 'idProjet' de 'projets')
        $table->foreignId('projet_id')->constrained('projets', 'idProjet')->onDelete('cascade');
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projets');
    }
};
