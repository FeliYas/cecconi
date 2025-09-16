@extends('layouts.guest')

@section('title', __('Novedades'))

@section('content')
    <div>
        <div class="relative overflow-hidden text-[#727777] lg:h-[40px]">
            <div class="absolute hidden lg:block inset-0 top-6 w-[90%] max-w-[1224px] mx-auto z-20 text-xs">
                <div>
                    <div class="flex gap-1">
                        <a href="{{ route('home') }}" class="font-bold hover:underline">{{ __('Inicio') }}</a>
                        <span>></span>
                        <a href="{{ route('novedades') }}" class="font-bold hover:underline">{{ __('Novedades') }}</a>
                        <span>></span>
                        <a href="{{ route('novedad', $novedadElegida->id) }}"
                            class="hover:underline">{{ $novedadElegida->titulo }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-15 flex flex-col lg:flex-row gap-30 w-[90%] max-w-[1224px] mx-auto text-black">
            <div class="w-full flex flex-col lg:flex-row gap-10">
                <div>
                    <img src="{{ $novedadElegida->path }}" alt="{{ $novedadElegida->titulo }} Image"
                        class="w-full lg:w-[600px] h-[400px] object-cover rounded-[10px]">
                </div>
                <div>
                    <h1 class="text-4xl font-bold mb-4">{{ $novedadElegida->titulo }}</h1>
                    <p class="text-[#727777] mb-6">{{ $novedadElegida->created_at->format('d/m/Y') }}</p>
                    <div class="custom-summernote" style="line-height: 26px;"></div>
                        <p>{!! $novedadElegida->descripcion !!}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
