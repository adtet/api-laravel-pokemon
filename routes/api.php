<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\FavoriteController;
use App\Http\Controllers\api\v1\PokemonController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/v1/favorite', [FavoriteController::class,'index']);
Route::post('/v1/favorite',[FavoriteController::class,'create']);
Route::get('/v1/favorite/ability',[FavoriteController::class,'ability']);
Route::get('/v1/favorite/excel',[FavoriteController::class,'excel']);
Route::get('/v1/pokemon',[PokemonController::class,'index']);
Route::get('/v1/pokemon/ability',[PokemonController::class,'ability']);