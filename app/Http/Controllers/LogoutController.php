<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //Prueba de funcionamiento
    public function store(){
        //dd('cerrando sesion');
        //cerrar sesion 
        auth()->logout();
        //Mandar al usuario a login
        return redirect()->route('login');
    }
}
