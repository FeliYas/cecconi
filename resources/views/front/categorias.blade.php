    @extends('layouts.guest')
    @section('meta')
        <meta name="{{ $metadatos->seccion }}" content="{{ $metadatos->keyword }}">
    @endsection

    @section('title', __('Productos'))

    @section('content')
        <div>
            <div class="relative overflow-hidden text-[#727777] h-[200px] bg-[#F0F0F0]">
                <div class="absolute hidden lg:block inset-0 top-6 w-[90%] max-w-[1224px] mx-auto z-20 text-xs">
                    <div>
                        <div class="flex gap-1">
                            <a href="{{ route('home') }}" class="font-bold hover:underline">{{ __('Inicio') }}</a>
                            <span> / </span>
                            <a href="{{ route('categorias') }}" class=" font-light hover:underline">{{ __('Productos') }}</a>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-0 w-[90%] max-w-[1224px] mx-auto flex items-center  h-full">
                    <div class="flex flex-col text-center gap-1">
                        <h2 class="text-[38px] font-bold text-black mt-28 mb-4">Productos</h2>
                    </div>
                </div>
            </div>
            <div class="py-20 w-[90%] max-w-[1224px] mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($categorias as $cat)
                    <a href="{{ route('producto', ['categoria' => $cat->id]) }}" class="h-[392px] relative group">
                        <img src="{{ $cat->path }}" alt="{{ $cat->titulo }} Image">
                        <div
                            class="opacity-0 group-hover:opacity-30 pointer-events-none group-hover:pointer-events-auto transition-opacity duration-300 absolute inset-0 bg-black rounded-[10px]">
                        </div>

                        <div
                            class="absolute bottom-0 flex flex-col items-center justify-center bg-main-color h-15 w-full rounded-b-[10px]">
                            <h3 class="text-white font-bold">
                                {{ $cat->titulo }}
                            </h3>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endsection
