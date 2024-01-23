<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ProduitsController;
use App\Http\Controllers\CommandesController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/produits', [ProduitsController::class, "liste"]);

Route::post('/produits', [ProduitsController::class, "ajouter"]);

Route::get('/commandes/{idClient}', [CommandesController::class, 'commandesClient']);

Route::delete('/commandes/{idCommande}', [CommandesController::class, 'supprimerCommande']);

Route::post('/client', [ClientsController::class, 'creerClient']);

Route::post('/client/authentification', [ClientsController::class, 'authentifierClient']);

