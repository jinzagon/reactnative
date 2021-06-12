<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth; 

class api_update_profil extends Controller
{
    public function update(Request $request, $id)
    {
        if (User::where('id', $id)->exists()) {
        $data = User::find($id);
        $data->civilité = is_null($request->civilité) ? $data->civilité : $request->civilité;
        $data->nom = is_null($request->nom) ? $data->nom : $request->nom;
        $data->prénom = is_null($request->prénom) ? $data->prénom : $request->prénom;
        $data->email = is_null($request->email) ? $data->email : $request->email;
        $data->password = is_null($request->password) ? $data->password : $request->password;
        $data->photo = is_null($request->photo) ? $data->photo : $request->photo;
        $data->ville = is_null($request->ville) ? $data->ville : $request->ville;
        $data->adresse = is_null($request->adresse) ? $data->adresse : $request->adresse;
        $data->save();

        return response()->json([
            "message" => "Mis à jour avec succès !"
        ], 200);
        } else {
        return response()->json([
            "message" => "Utilisateur inexistant  .."
        ], 404);
        
    }
    }
}
