<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api_connexion;
use App\Http\Controllers\api_inscription;
use App\Http\Controllers\api_update_profil;
use App\Models\User;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

//Route::post('/signup', [UserController::class, 'userSignUp']);
Route::post('/login', [api_connexion::class, 'userLogin']);
Route::post('/signup', [api_inscription::class, 'userSignUp']);
Route::put('/update/{id}', [api_update_profil::class, 'update']);