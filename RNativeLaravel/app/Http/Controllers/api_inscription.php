<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class api_inscription extends Controller
{
    private $status_code    =        200;

    public function userSignUp(Request $request) {
        $validator              =        Validator::make($request->all(), [
            "civilité"              =>      "required",
            "nom"              =>           "required",
            "prénom"              =>        "required",
            "email"             =>          "required|email",
            "password"          =>          "required",
        ]);

        if($validator->fails()) {
            return response()->json(["status" => "failed", "message" => "validation_error", "errors" => $validator->errors()]);
        }

       
        $userDataArray          =       array(
            "civilité"          =>           $request->civilité,
            "prénom"          =>             $request->prénom,
            "nom"             =>             $request->nom,
            "email"           =>             $request->email,
            "password"        =>             md5($request->password),
        );

        $user_status            =           User::where("email", $request->email)->first();

        if(!is_null($user_status)) {
           return response()->json(["status" => "failed", "success" => false, "message" => "Whoops! email already registered"]);
        }

        $user                   =           User::create($userDataArray);

        if(!is_null($user)) {
            return response()->json(["status" => $this->status_code, "success" => true, "message" => "Registration completed successfully", "data" => $user]);
        }

        else {
            return response()->json(["status" => "failed", "success" => false, "message" => "failed to register"]);
        }
}
}