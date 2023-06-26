@extends('layouts.app')

@section('titulo')
    Inicia Sesion
@endsection

@section('contenido')
<div class="md:flex md:justify-center md:gap=10 md:items-center">
    <div class="md:w-6/12 p-5">
        <img src="{{asset('Imagenes/Materiales DevStagram-UPV/Materiales DevStagram-UPV/Diseño/registrar.jpg')}}" alt="Imagen de registro de usuario">
    </div>
    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
        <!-- Formulario de registro -->
        <form action="{{route('login')}}" method="POST"novalidate>
            @csrf
            @if(session('mensaje'))
                <p class="bg-red-500 text-white my-2 rounded-lg p-2 text-center">
                    {{session('mensaje')}}
                </p>
            @endif
            <div class="mb-5">
                <label for="email" class="mb-2 black uppercase text-gray-500 font-bold">
                    Email
                </label>
                <input
                    id="email"
                    name="email"
                    type="text"
                    placeholder="Ingresa tu email"
                    class="border p-3 w-full rounded tg
                    @error('email')
                        border-red-500
                    @enderror"
                    value="{{old('email')}}"
                />
                @error('email')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{$message}}
                    </p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="password" class="mb-2 black uppercase text-gray-500 font-bold">
                    Password
                </label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    placeholder="Ingresa tu password"
                    class="border p-3 w-full rounded tg
                    @error('password')
                        border-red-500
                    @enderror"
                    value="{{old('password')}}"
                />
                <!-- Mostrar directiva de registro de nombre obligatorio -->
                @error('password')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{$message}}
                    </p>
                @enderror
            </div>
            <!-- Check de mantener sesion iniciada-->
            <div class="mb-5">
                <input type="checkbox" name="remember">
                <label class="text-gray-500 text-sm">
                    Mantener sesion abierta
                </label>
            </div>
            <input
                type="submit"
                value="Iniciar sesion"
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
            />
        </form>
    </div>
</div>
@endsection