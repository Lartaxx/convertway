<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthController extends Controller
{
    protected function login_view() {
        return view("auth.login");
    }

    protected function register_view() {
        return view("auth.register");
    }

    protected function login_callback(Request $request) {
        $request->validate([
            "email" => "required",
            "password" => "required"
        ]);
        $datas = $request->all();
        
        $hasUser = User::where("email", $datas["email"])->first();

        if ($hasUser) {
            if ( password_verify($datas["password"], $hasUser->password) ) {
                auth()->login($hasUser);
                return redirect()->route("panel_view")->with("success.login", "👋 Bienvenue {$hasUser->name} sur ConvertWAY !");
            }
            else {
                return redirect()->back()->with("error.login", "Le mot de passe entré est erroné...");
            }
        }
        else {
            return redirect()->back()->with("error.login", "Les données entrées sont erronées...");
        }
    }

    protected function register_callback(Request $request) {
        $request->validate([
            "firstName" => "required",
            "lastName" => "required",
            "email" => "required",
            "password" => "required",
            "passwordConfirmed" => "required|same:password"
        ]);
        $datas = $request->all();
        try {
            $newUser = User::create([
                "name" => "{$datas['firstName']} {$datas['lastName']}",
                "email" => $datas["email"],
                "password" => password_hash($datas["password"], PASSWORD_DEFAULT)
            ]);
        } catch(\Exception $e) {
            
            return redirect()->back()->with("error.register", "L'adresse email entrée est associée à un compte déjà existant.");
        }

        auth()->login($newUser);

        return redirect()->route("panel_view")->with("success.login", "Votre compte a bien été créé !");

    }

    protected function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route("login_view")->with("success.logout", "Déconnexion effectuée avec succès !");
    }

}
