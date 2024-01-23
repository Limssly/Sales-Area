<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class ClientsController extends Controller
{
    public function creerClient(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => ['required', 'email', Rule::unique('clients')],
            'password' => 'required|min:8',
        ]);

        $client = Client::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        return response()->json(['message' => 'Client créé avec succès', 'client' => $client], 201);
    }

    public function authentifierClient(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'motDePasse' => 'required|min:8',
        ]);

        $client = Client::where('email', $request->email)->first();

        if (!$client || !password_verify($request->motDePasse, $client->password)) {
            return response()->json(['message' => 'Identifiants invalides'], 401);
        }

        return response()->json(['message' => 'Client authentifié avec succès', 'client' => $client]);
    }
}
