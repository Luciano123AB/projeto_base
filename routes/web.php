<?php

use App\Http\Controllers\MainController;
use App\Http\Middleware\Checar;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view("index");
});

Route::get("/home", [MainController::class, "home"])->name("home");

Route::middleware([Checar::class])->group(function() {
    //
});