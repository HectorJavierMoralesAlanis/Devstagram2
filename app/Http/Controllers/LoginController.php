<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index(){
        return view('auth.login');
    }

    //Metodo de validacion de formulario de laogin
    public function store(Request $request){
        //Depurar para ver su funcionalidad
        $this->validate($request,[
        'email' => 'required|email',
        'password' => 'required'
        ]);

        //Valacion de credenciales correctas
        if(!auth()->attempt($request->only('email','password'),$request->remember)){
            //Utilizar directiva "with" para llenar los valores de la sesion
            return back()->with('mensaje','credenciales incorrectas');
        }

        //Credenciales correctas
        return redirect()->route('post.index',auth()->user()->username);
    }
}

