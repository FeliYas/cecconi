@extends('layouts.guest')
@section('meta')
    <meta name="{{ $metadatos->seccion }}" content="{{ $metadatos->keyword }}">
@endsection

@section('title', __('Nosotros'))

@section('content')
    <div>
        <div class="relative overflow-hidden text-[#727777] h-[200px] bg-[#F0F0F0]">
            <div class="absolute hidden lg:block inset-0 top-6 w-[90%] max-w-[1224px] mx-auto z-20 text-xs">
                <div>
                    <div class="flex gap-1">
                        <a href="{{ route('home') }}" class="font-bold hover:underline">{{ __('Inicio') }}</a>
                        <span> / </span>
                        <a href="{{ route('nosotros') }}" class=" font-light hover:underline">{{ __('Nosotros') }}</a>
                    </div>
                </div>
            </div>
            <div class="absolute inset-0 w-[90%] max-w-[1224px] mx-auto flex items-center  h-full">
                <div class="flex flex-col text-center gap-1">
                    <h2 class="text-[38px] font-bold text-black mt-28 mb-4">Nosotros</h2>
                </div>
            </div>
        </div>
        <div class="bg-white py-20">
            <div class="w-[90%] max-w-[1224px] mx-auto flex flex-col lg:flex-row gap-22">
                <div class="flex flex-col gap-10 lg:w-1/2 text-black justify-center">
                    <h2 class="font-bold text-[32px]">{{ $nosotros->titulo }}</h2>
                    <div class="custom-summernote" style="line-height: 26px;">
                        <p>{!! $nosotros->descripcion !!}</p>
                    </div>
                </div>
                <div>
                    <img src="{{ asset($nosotros->path) }}" alt="imagen nosotros" class="w-full h-[504px] rounded-[6px]">
                </div>
            </div>
        </div>
        <div class="bg-[#F5F5F5] py-20">
            <div class="w-[90%] max-w-[1224px] mx-auto">
                <div class="flex flex-col gap-5">
                    <h2 class="text-black text-[32px] font-bold">{{ __('¿Por que elegirnos?') }}</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        @foreach ($tarjetas as $tarjeta)
                            <x-TarjetaNosotros :tarjeta="$tarjeta" />
                        @endforeach
                    </div>
                </div>
                <div class="pt-20 relative">
                    <video id="videoNosotros" src="{{ asset($nosotros->video) }}"
                        class="rounded-[6px] w-full h-[688px] object-cover z-10" playsinline></video>

                    <div id="playButton"
                        class="absolute inset-0 h-[688px] w-full flex items-center justify-center text-white z-20 pt-20 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 120 120"
                            fill="none">
                            <path
                                d="M60 110C87.6142 110 110 87.6142 110 60C110 32.3858 87.6142 10 60 10C32.3858 10 10 32.3858 10 60C10 87.6142 32.3858 110 60 110Z"
                                stroke="white" stroke-width="8" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M50 40L80 60L50 80V40Z" stroke="white" stroke-width="8" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const video = document.getElementById('videoNosotros');
        const playButton = document.getElementById('playButton');

        playButton.addEventListener('click', () => {
            video.play(); // ▶️ reproduce el video
            playButton.style.display = 'none'; // 🚫 oculta el svg
        });

        // Opcional: si pausás el video, que vuelva a aparecer el botón
        video.addEventListener('pause', () => {
            playButton.style.display = 'flex';
        });
    </script>
@endsection
