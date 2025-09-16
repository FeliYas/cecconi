@extends('layouts.guest')
@section('meta')
    <meta name="{{ $metadatos->seccion }}" content="{{ $metadatos->keyword }}">
@endsection

@section('title', __('Clientes'))

@section('content')
    <div>
        <div class="relative overflow-hidden text-[#727777] h-[200px] bg-[#F0F0F0]">
            <div class="absolute hidden lg:block inset-0 top-6 w-[90%] max-w-[1224px] mx-auto z-20 text-xs">
                <div>
                    <div class="flex gap-1">
                        <a href="{{ route('home') }}" class="font-bold hover:underline">{{ __('Inicio') }}</a>
                        <span> / </span>
                        <a href="{{ route('clientes') }}" class=" font-light hover:underline">{{ __('Clientes') }}</a>
                    </div>
                </div>
            </div>
            <div class="absolute inset-0 w-[90%] max-w-[1224px] mx-auto flex items-center  h-full">
                <div class="flex flex-col text-center gap-1">
                    <h2 class="text-[38px] font-bold text-black mt-28 mb-4">Clientes</h2>
                </div>
            </div>
        </div>
        <div class="bg-white py-20 grid grid-cols-2 lg:grid-cols-4 gap-6 w-[90%] max-w-[1224px] mx-auto text-black">
            @foreach ($clientes as $cliente)
                <div class="h-[160px] max-w-[300px] bg-white p-4 shadow-md border border-gray-200 rounded-[6px]">
                    <img src="{{ asset($cliente->path) }}" alt="cliente"
                        class="w-full h-full object-contain transition-all duration-300 filter grayscale hover:grayscale-0 rounded-[6px]">
                </div>
            @endforeach
        </div>
    </div>
@endsection
