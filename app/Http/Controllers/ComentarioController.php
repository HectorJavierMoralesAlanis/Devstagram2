<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    //Alamacenar comentarios
    public function store(Request $request,Post $post){
        $this->validate($request,[
            'comentario' => 'required|max:255'
        ]);
        Comentario::create([
            'user_id'=> $post->user->id,
            'post_id'=> $post->id,
            'comentario' =>$request->comentario
        ]);
        return back()->with('mensaje','Comentario Realizado Correctamente');
    }
    
}

