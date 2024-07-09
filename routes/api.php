<?php

use Illuminate\Http\Request;
use App\Http\Controllers\character;
use Illuminate\Support\Facades\Route;

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


Route::post('add', [character::class,'add'])->middleware('check entery');

Route::get('retrive/{name}', [character::class,'retrive'])->middleware('CheckCharacterv');

Route::put('modify/{name}', [character::class,'modify'])->middleware('CheckCharacterv');

Route::delete('delete/{name}', [character::class,'delete'])->middleware('CheckCharacterv');