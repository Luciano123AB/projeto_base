<?php

namespace App\Services;

use Illuminate\Support\Facades\Artisan;

class Boot
{
    public static function comandos() {
        Artisan::call("", [
            "--force" => true
        ]);
        Artisan::call("", [
            "--class" => "",
            "--force" => true
        ]);
        shell_exec("npm install 2>&1");

        session(["boot" => true]);
    }
}
