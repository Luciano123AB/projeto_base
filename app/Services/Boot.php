<?php

namespace App\Services;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class Boot
{
    public static function testarConexao() {
        
        $banco = null;

        try {
            DB::connection()->getPdo();

            $banco = true;

        } catch (\Exception $e) {

            $banco = false;
            
        }

        return $banco;
    }
    
    public static function criarPovoarBanco() {
        Artisan::call("migrate", [
            "--force" => true
        ]);
        Artisan::call("db:seed", [
            "--class" => "UsuariosTableSeeder",
            "--force" => true
        ]);

        session(["boot" => true]);
    }

    public static function dependencias() {
        shell_exec("npm install 2>&1");
    }
}
