@extends('layouts.app')
@section('titulo')
    Registarte
@endsection
@section('contenido')
    <div class="md:flex md:justify-center md:gap=10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{asset('Imagenes/Materiales DevStagram-UPV/Materiales DevStagram-UPV/Diseño/registrar.jpg')}}" alt="Imagen de registro de usuario">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <!-- Formulario de registro -->
            <form action={{'register'}} method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for ="name" class="mb-2 black uppercase text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        placeholder="Ingresa tu nombre"
                        class="border p-3 w-full rounded tg
                        @error('name')
                            border-red-500
                        @enderror"
                        value="{{old('name')}}"
                    />
                    <!-- Mostrar directiva de registro de nombre obligatorio -->
                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="username" class="mb-2 black uppercase text-gray-500 font-bold">
                        Usuario
                    </label>
                    <input
                        id="username"
                        name="username"
                        type="text"
                        placeholder="Ingresa tu usuario"
                        class="border p-3 w-full rounded tg
                        @error('username')
                            border-red-500
                        @enderror"
                        value="{{old('usuario')}}"
                    />
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{$message}}
                        </p>
                    @enderror
                </div>
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
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 black uppercase text-gray-500 font-bold">
                        Repite tu Password
                    </label>
                    <input
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        placeholder="Reingresa tu password"
                        class="border p-3 w-full rounded tg
                        @error('repassword')
                            border-red-500
                        @enderror"
                        value="{{old('repassword')}}"
                    />
                    <!-- Mostrar directiva de registro de nombre obligatorio -->
                    @error('repassword')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <input
                    type="submit"
                    value="crear cuenta"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                />
            </form>
        </div>
    </div>
@endsection