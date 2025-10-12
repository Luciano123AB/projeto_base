<?php

namespace App\Services;

use Illuminate\Support\Facades\Artisan;

class Boot
{
    public static function criarPovoarBanco() {
        Artisan::call("", [
            "--force" => true
        ]);
        Artisan::call("", [
            "--class" => "",
            "--force" => true
        ]);

        session(["boot" => true]);
    }

    public static function dependencias() {
        shell_exec("npm install 2>&1");
    }
}
