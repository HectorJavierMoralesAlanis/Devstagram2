@extends('layouts.app')

@section('titulo')
    Post Imagen
@endsection
@section('contenido')
    <div class="md:flex md:justify-center md:gap=10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{asset('Imagenes/Materiales DevStagram-UPV/Materiales DevStagram-UPV/Diseño/registrar.jpg')}}" alt="Imagen de registro de usuario">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <!-- Formulario de registro -->
            <form action="/file-upload" class="dropzone" id="my-awesome-dropzone">
            </form>
            <script>
                Dropzone.options.myGreatDropzone = { // camelized version of the `id`
                    paramName: "file", // The name that will be used to transfer the file
                    maxFilesize: 2, // MB
                    accept: function(file, done) {
                    if (file.name == "justinbieber.jpg") {
                            done("Naha, you don't.");
                    }
                        else { done(); }
                }
                };
            </script>
            <form action={{'register'}} method="POST" novalidate>
                @csrf
                
                <div class="mb-5">
                    <label for ="postN" class="mb-2 black uppercase text-gray-500 font-bold">
                        Nombre del post
                    </label>
                    <input
                        id="postN"
                        name="postN"
                        type="text"
                        placeholder="Ingresa la nombre del post"
                        class="border p-3 w-full rounded tg
                        @error('postN')
                            border-red-500
                        @enderror"
                        value="{{old('postN')}}"
                    />
                    <!-- Mostrar directiva de registro de nombre obligatorio -->
                    @error('postN')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="postD" class="mb-2 black uppercase text-gray-500 font-bold">
                        Repite tu Password
                    </label>
                    <input
                        id="postD"
                        name="postD"
                        type="text"
                        placeholder="Ingresa la descripcion de tu post"
                        class="border p-3 w-full rounded tg
                        @error('postD')
                            border-red-500
                        @enderror"
                        value="{{old('postD')}}"
                    />
                    <!-- Mostrar directiva de registro de nombre obligatorio -->
                    @error('postD')
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
