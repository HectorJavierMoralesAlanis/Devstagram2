<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Validated;
use Symfony\Contracts\Service\Attribute\Required;

class RegisterController extends Controller
{
    //
    public function index ()
    {
        return view('auth.register');
    }

    //Creacion del primer metodo
    public function store(Request $request){
        //'dd' significa 'dumb and die' imprime lo que se tiene en el valor de 'dd' se detiene la ejecucion total de laravel
        //Modificar el $request para que nose repitan los "username"
        $request->request->add(['username'=>Str::slug($request->username)]);

        //Validar campos de formulario
        $this->validate($request,[
            //Pasamos las reglas de validacion de cada uno de los campos
            //Validamos "username" y "email" com0o unico relacionados con la tabla "users" generada automaticamente con la instalacion de laravel
            'name' => 'required|min:4|max:20',
            'username' => 'required|unique:users|min:3|max:30',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:2',
            'password_confirmation' => '',
        ]);

        //Insertar datos a la tabla de usuarios
        //este Utiliza los name
        User::create([
            'name' => $request->name,
            'username' =>$request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'password_confirmation' => $request->password,
        ]);
        //Autenticar un usuario con el metodo "attemp"
        //Opcion 1
        auth()->attempt([
            'email'=>$request->email,
            'password' =>$request->password
        ]);
        //Opcion 2
        //auth()->attempt($request->only('email','password'));
        //Redireccionando
        return redirect()->route('post.index');
    }
}
