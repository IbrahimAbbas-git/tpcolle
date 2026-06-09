<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tache; 
use App\Models\User;

class Projet extends Model
{
    use HasFactory;

    protected $primaryKey = 'idProjet'; // Indique à Laravel ta clé personnalisée
    protected $fillable = ['nomProjet', 'dateDebut', 'dateFin', 'lienGithub'];
    public function taches()
{
    // Laravel va chercher 'projet_id' dans la table taches
    return $this->hasMany(Tache::class, 'projet_id', 'idProjet');
}
}