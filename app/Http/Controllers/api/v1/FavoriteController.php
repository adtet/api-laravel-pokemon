<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class FavoriteController extends Controller
{
    //
    public function index(Request $request){
        
        $url_pokemon = "https://pokeapi.co/api/v2/ability/?limit=".$request->query('limit')."&offset=".$request->query('offset');

        $response = Http::get($url_pokemon);

        if ($response->successful()) {
            $pokemonData = $response->json();
            return response()->json($pokemonData);
        } else {
            return response()->json(['error' => 'Pokemon not found'], 404);
        }
    }
}