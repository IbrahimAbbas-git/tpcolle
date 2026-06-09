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
    Schema::create('projets', function (Blueprint $table) {
        // idProjet comme clé primaire (incrémentale)
        $table->id('idProjet'); 
        
        $table->string('nomProjet', 100);
        $table->date('dateDebut');
        $table->date('dateFin')->nullable(); // nullable si le projet n'a pas de date de fin définie
        $table->string('lienGithub')->nullable(); // nullable si le projet n'a pas encore de dépôt Git
        
        $table->timestamps(); // Génère automatiquement created_at et updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taches');
    }
};
