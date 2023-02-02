<?php

use Illuminate\Support\Facades\Route;

// Custom controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PanelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/connexion', 'login_view')->name("login_view");
    Route::get("/inscription", "register_view")->name("register_view");
    Route::get("/inscription/google", "register_google_view")->name("register_google_view");
    Route::get("/deconnexion", "logout")->name("logout");
    
    Route::post('/connexion', 'login_callback')->name("login_callback");
    Route::post("/inscription", "register_callback")->name("register_callback");
});


Route::controller(PanelController::class)->middleware("auth")->group(function () {
    Route::get("/panel", 'panel_view')->name("panel_view");
    Route::get("/panel/convertir", 'panel_convert_view')->name("panel_convert_view");
    Route::get("/panel/mes-conversions", 'my_convert_view')->name("my_convert_view");
    Route::get("/panel/mon-profil", 'my_profile_view')->name("my_profile_view");
    Route::get("/panel/admin/conversions", "admin_forms_view")->name("admin_forms_view")->middleware("admin");
    Route::get("/panel/admin/utilisateurs", "admin_users_view")->name("admin_users_view")->middleware("admin");
    Route::get("/panel/admin/utilisateurs/{userId}", "admin_users_callback")->middleware("admin");
    Route::get("/panel/notifications", "mark_all_as_read")->name("notif.mark_all_as_read");
    
    Route::post("/panel/mon-profil", 'my_profile_callback')->name("my_profile_callback");
    Route::post("/panel/convertir", 'panel_convert_callback')->name("panel_convert_callback");
    Route::post("/panel/admin/conversions/{id}", "admin_forms_callback")->name("admin_forms_callback")->middleware("admin");
});