<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class PokemonController extends Controller
{
    //

    public function index(Request $request){

        $url_pokemon = "https://pokeapi.co/api/v2/pokemon/?limit=".$request->query('limit')."&offset=".$request->query('offset');

        $name = $request->query('name');

        if(isset($name)){
            $url_pokemon = "https://pokeapi.co/api/v2/pokemon/".$name;
        }
        

        $response = Http::get($url_pokemon);

        if ($response->successful()) {
            $pokemonData = $response->json();
            return response()->json($pokemonData);
        } else {
            return response()->json(['error' => 'Pokemon not found'], 404);
        }
    }


    public function ability(Request $request){
        

        $url = "https://pokeapi.co/api/v2/ability/";

        $name = $request->query('name');

        if(isset($name)){
            $url = $url.$name;
        }

        $response = Http::get($url);

        if ($response->successful()) {
            $pokemonData = $response->json()['pokemon'];
            return response()->json($pokemonData);
        } else {
            return response()->json(['error' => 'Pokemon not found'], 404);
        }
        
    }

    

    



    
}