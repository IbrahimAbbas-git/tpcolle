<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getProjectTasks($id)
    {
        // 1. On cherche le projet par son ID. 
        // Le 'with' charge la relation 'taches', et le 'taches.user' charge l'utilisateur de chaque tâche.
        $projet = Projet::with(['taches.user:id,name'])->find($id);

        // 2. Si le projet n'existe pas, on renvoie une erreur 404
        if (!$projet) {
            return response([
                'message' => 'Projet non trouvé.'
            ], 404);
        }

        // 3. On retourne le projet complet structuré en JSON
        return response()->json($projet, 200);
    }
}
