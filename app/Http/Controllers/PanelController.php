<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Notification;


// Custom models
use App\Models\Convertions;
use App\Models\User;
use App\Notifications\NotificationMessage;

class PanelController extends Controller
{
   
    protected function panel_view() {
        $allMoney = Convertions::where(["userId" => Auth::user()->id, "status" => "2"])->sum("value");
        $allCards = Convertions::where(["userId" => Auth::user()->id, "status" => "2"])->count();
        $refusedRequests = Convertions::where(["userId" => Auth::user()->id, "status" => 3])->count();
        $pendingRequests = Convertions::where(["userId" => Auth::user()->id, "status" => 1])->count();
        return view("panel.index", ["allMoney" => $allMoney, "allCards" => $allCards, "refusedRequests" => $refusedRequests, "pendingRequests" => $pendingRequests]);
    }

    protected function panel_convert_view() {
        return view("panel.convert");
    }

    protected function panel_convert_callback(Request $request) {
        $request->validate([
            "valueCard" => "required",
            "psc" => "required|min:19|max:19",
            "convertionTaxes" => "required"
        ]);
        $datas = $request->all();
        Convertions::create([
            "userId" => Auth::user()->id,
            "value" => $datas["valueCard"],
            "payment" => $datas["payment"],
            "type" => $datas["convertionTaxes"],
            "code" => $datas["psc"],
            "status" => 1
        ]);
        return redirect()->back()->with("success.form_sended", "Formulaire envoyé avec succès, vous recevez une réponse sous peu.");
    }

    protected function my_convert_view() {
        $converts = Convertions::where("userId", Auth::user()->id)->get();
        return view("panel.my_convert", ["converts" => $converts]);
    }

    protected function admin_forms_view() {
        $forms = Convertions::get();
        return view("admin.forms", ["forms" => $forms]);
    }

    protected function admin_forms_callback(Request $request, $id) {
        $requestSended = Convertions::where("id", $id)->first();

        if ($requestSended) {
            $request->validate([
                "status" => "required"
            ]);
            $datas = $request->all();
            $requestSended->update([
                "status" => $datas["status"],
                "updated_at" => \Carbon\Carbon::now()
            ]);
            $userToNotif = User::where("id", $requestSended->userId)->first();
            $notification = [
                "userId" => $userToNotif->id,
                "body" => "Le status de votre commande #{$id} a changé !"
            ];
            Notification::send($userToNotif, new NotificationMessage($notification));

            return redirect()->back()->with("success.request_updated", "La demande #{$id} a bien été modifiée !");
        }
        else {
            return redirect()->route("panel_view")->with("error.request_not_found", "La demande #{$id} n'a pas été trouvée...");
        }
    }

    protected function mark_all_as_read() {
        foreach(Auth::user()->unreadNotifications->take(3) as $notification) {
            $notification->markAsRead();
        }
        return redirect()->back();
    }

    protected function admin_users_view() {
        $allUsers = User::get();
        return view("admin.users", ["allUsers" => $allUsers]);
    }

    protected function admin_users_callback($userId) {
        $userToUpdate = User::where("id", $userId)->first();

        if (isset($userToUpdate)) {
            $newPassword = Str::random(8);
            $hashedPassword = Hash::make($newPassword);

            $userToUpdate->update([
                "password" => $hashedPassword,
                "updated_at" => \Carbon\Carbon::now()
            ]);

            $userToNotif = User::where("id", Auth::user()->id)->first();
            $notification = [
                "userId" => $userToNotif->id,
                "body" => "Le nouveau mot de passe de {$userToUpdate->name} est {$newPassword}"
            ];
            Notification::send($userToNotif, new NotificationMessage($notification));

            return redirect()->back()->with("success.user_updated", "Le mot de passe de {$userToUpdate->name} a bien été réinitialisé, regardez vos notifications récentes !");
        }
    }

    protected function my_profile_view() {
        return view("panel.my_profile");
    }

    protected function my_profile_callback(Request $request) {
        $request->validate([
            "actualPassword" => "required",
            "newPassword" => "required",
            "repeatedNewPassword" => "required|same:newPassword",
        ]);
        $datas = $request->all();

        if (password_verify($datas["actualPassword"], Auth::user()->password)) {
            Auth::user()->update([
                "password" => Hash::make($datas["newPassword"])
            ]);
            return redirect()->route("panel_view")->with("success.user_updated", "Votre mot de passe a bien été mis à jour.");
        }
        else {
            return redirect()->back()->with("error.user_updated", "Mot de passe erronné.");
        }
    }

}
