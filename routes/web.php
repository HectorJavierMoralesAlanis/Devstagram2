<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ComentarioController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/crear-cuenta',function(){
    return view('auth.register');
});
//Ruta para registro de usuario
Route::get('/register',[RegisterController::class,'index'])->name("register");
//Ruta para enviar datos al servidor
Route::post('/register',[RegisterController::class,'store']);

//Ruta para vista del muro de perfil de usuario autentucado
Route::get('/muro',[PostController::class,'index'])->name('post.index');

//Ruta para el login
Route::get('/login',[LoginController::class,'index'])->name('login');

//Ruta para la validacion del login
Route::post('/login',[LoginController::class, 'store']);

//Ruta para logout
Route::get('/logout',[LogoutController::class,'store'])->name('logout');


Route::get('/{user:username}',[PostController::class,'index'])->name('posts.index');
//Rutaa para el formulario de post de publicacion
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
Route::post('/posts',[PostController::class,'store'])->name('posts.store');
Route::get('/posts/{post}',[PostController::class,'show'])->name('posts.show');
Route::post('/post/{post}',[ComentarioController::class,'store'])->name('comentarios.store');
Route::delete('/post/{post}',[PostController::class,'destroy'])->name('posts.destroy');
//Route::post;
//Ruta para cargar Imagen
Route::post('/',[ImagenController::class,'store'])->name('imagenes.store');
//Ruta para hacer el post de la imagen
//Route::post('/posts',[PostController::class,'store'])->name("posts.store"); 
//Ruta para 
