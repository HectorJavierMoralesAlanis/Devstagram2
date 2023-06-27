@extends('layouts.app')

@section('titulo')
    Pagina Principal
@endsection

@section('contenido')
    <div class="felx justify-center">
        <div class="w-full md:w-8/12 lg:w/12 md:flex">
            <div class="md:w-8/12 lg:w-6/12 px-5">
                <img src="{{asset('Imagenes/Materiales DevStagram-UPV/Materiales DevStagram-UPV/usuario.svg')}}" alt="Imagen de usuario">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5">
                <p class="text-gray-700 text-2xl">
                    <!---->
                    dd($user)
                </p>
                <!-- Añadir mas contenido -->
            <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                0
                <spam class="font-normal">Seguidores</spam>
            </p>
            <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                0
                <spam class="font-normal">Siguiendo</spam>
            </p>
            <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                0
                <spam class="font-normal">Post</spam>
            </p>
            </div>
        </div>
    </div> 

    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>
        @if($posts->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach($posts as $post)
            <div>
                <a href="{{route('posts.show',$string=implode(',',(get_object_vars($post))))}}">
                    <img src="{{asset('uploads').'/'.$post->imagen}}" alt="Imagen del post {{$post->titulo}}">
                </a>
            </div>
        @endforeach
        </div>
        <div>
            {{$posts->links('pagination::tailwind')}}
        </div>
        @else
            <a class="text-gray-600 uppercase text-center font-bold">No hay publicaciones</a>
        @endif
    </section>
@endsection
