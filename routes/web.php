<?php

use App\Http\Controllers\MainController;
use App\Http\Middleware\Checar;
use App\Services\Boot;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    if (!session("boot")) {
        Boot::comandos();
    }
    
    return view("index");
});

Route::get("/home", [MainController::class, "home"])->name("home");

Route::middleware([Checar::class])->group(function() {
    //
});
