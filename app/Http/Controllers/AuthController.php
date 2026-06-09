<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // 1. INSCRIPTION (Register)
    public function register(Request $request)
    {
        // Validation des données entrantes
        $fields = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed' // attend un champ password_confirmation
        ]);

        // Création de l'utilisateur en base de données
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => Hash::make($fields['password']),
        ]);

        // Création du Token Sanctum
        $token = $user->createToken('main_token')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ], 201); // 201 = Created
    }

    // 2. CONNEXION (Login)
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        // Vérifier si l'email existe
        $user = User::where('email', $fields['email'])->first();

        // Vérifier le mot de passe
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Identifiants incorrects.'
            ], 401); // 401 = Unauthorized
        }

        // Générer un nouveau Token
        $token = $user->createToken('main_token')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ], 200);
    }

    // 3. DÉCONNEXION (Logout)
    public function logout(Request $request)
    {
        // Supprime le token actuel de l'utilisateur connecté
        $request->user()->currentAccessToken()->delete();

        return response([
            'message' => 'Déconnexion réussie, token supprimé.'
        ], 200);
    }
}