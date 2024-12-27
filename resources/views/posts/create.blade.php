@extends('layouts.app')

@section('titulo')
    Crea una nueva Publicacion
@endsection

@section('contenido')
    <div class=" md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            Imagen aqui
        </div>
        <div class="md:w-1/2 px-10  bg-white p-10 rounded-lg shadow-xl md:mt-0">
            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                           Nombre
                    </label>
                    <input 
                        id="name"
                        name="name"
                        type="text"
                        placeholder="Tu Nombre"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        value="{{ old('name') }}"
                    />

                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                    @enderror
                </div>
            </form>
        </div>
    </div>
@endsection