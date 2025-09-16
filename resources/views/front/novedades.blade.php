@extends('layouts.guest')
@section('meta')
    <meta name="{{ $metadatos->seccion }}" content="{{ $metadatos->keyword }}">
@endsection

@section('title', __('Novedades'))

@section('content')
    <div>
        <div class="relative overflow-hidden text-[#727777] h-[200px] bg-[#F0F0F0]">
            <div class="absolute hidden lg:block inset-0 top-6 w-[90%] max-w-[1224px] mx-auto z-20 text-xs">
                <div>
                    <div class="flex gap-1">
                        <a href="{{ route('home') }}" class="font-bold hover:underline">{{ __('Inicio') }}</a>
                        <span> / </span>
                        <a href="{{ route('novedades') }}" class=" font-light hover:underline">{{ __('Novedades') }}</a>
                    </div>
                </div>
            </div>
            <div class="absolute inset-0 w-[90%] max-w-[1224px] mx-auto flex items-center  h-full">
                <div class="flex flex-col text-center gap-1">
                    <h2 class="text-[38px] font-bold text-black mt-28 mb-4">Novedades</h2>
                </div>
            </div>
        </div>
        <div class="bg-white py-20 w-[90%] max-w-[1224px] mx-auto text-black flex flex-col gap-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($novedades as $novedad)
                    <div class="h-[559px] relative group bg-white rounded-[10px] border border-[#DEDFE0]">
                        <!-- contenedor solo de la imagen -->
                        <div class="relative">
                            <img src="{{ $novedad->path }}" alt="{{ $novedad->titulo }} Image"
                                class="w-full h-[312px] object-cover rounded-t-[10px]">
                            <div
                                class="absolute inset-0 bg-black group-hover:opacity-30 opacity-0 transition-opacity duration-300 rounded-t-[10px] pointer-events-none group-hover:pointer-events-auto">
                            </div>
                        </div>

                        <!-- textos -->
                        <div class="flex flex-col gap-4 p-6 text-black h-[247px]">
                            <div class="h-[58px]">
                                <p class="font-bold text-main-color">{{ ucfirst($novedad->epigrafe) }} </p>
                                <h3 class="text-2xl font-semibold line-clamp-2">{{ $novedad->titulo }}</h3>
                            </div>
                            <div class="h-[125px] flex flex-col justify-between">
                                <div class="custom-summernote">
                                    <p>{!! $novedad->descripcion !!}</p>
                                </div>
                                <div class="flex justify-between items-center text-[#727777]">
                                    {{ $novedad->created_at->format('d/m/Y') }}
                                    <a href="{{ route('novedad', $novedad->id) }}"
                                        class="group-hover:text-[#E30412] transition-colors duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 4L10.59 5.41L16.17 11H4V13H16.17L10.59 18.59L12 20L20 12L12 4Z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
