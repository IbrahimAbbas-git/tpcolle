<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Projet; 
use App\Models\User;
class Tache extends Model
{
    use HasFactory;

    protected $primaryKey = 'idTache'; // Indique à Laravel ta clé personnalisée
    protected $fillable = ['titre', 'detail', 'etat', 'priorite', 'user_id', 'projet_id'];
    public function user()
{
    // Laravel lie 'user_id' de la table taches à l'id de la table users
    return $this->belongsTo(User::class, 'user_id', 'id');
}
}
