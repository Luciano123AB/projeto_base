<?php

use App\Http\Controllers\MainController;
use App\Http\Middleware\Checar;
use App\Services\Boot;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    
    $banco = null;

    try {
        DB::connection()->getPdo();
        $banco = true;
    } catch (\Exception $e) {
        $banco = false;
    }
        
    if ($banco == false) {
        Boot::criarPovoarBanco();
    }

    if (is_dir(base_path("vendor")) || is_dir(base_path("node_modules"))) {
        Boot::dependencias();
    }
    
    return view("index");
});

Route::get("/home", [MainController::class, "home"])->name("home");

Route::middleware([Checar::class])->group(function() {
    //
});
