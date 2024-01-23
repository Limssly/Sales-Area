<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Commande;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommandesController extends Controller
{
    function commandesClient($idClient)
    {
        $client = Client::find($idClient);

        if (!$client) {
            return response()->json(['message' => 'Client not found'], 404);
        }

        $commandes = $client->commandes()->with('produit')->get();

        return response()->json($commandes);
    }

    public function supprimerCommande($idCommande)
    {
        // $commande = Commande::find($idCommande);

        // if (!$commande) {
        //     return response()->json(['message' => 'Commande not found'], 404);
        // }

        // $commande->delete();

        // return response()->json(['message' => 'Commande deleted successfully']);

        Commande::destroy(1);
    }
}
