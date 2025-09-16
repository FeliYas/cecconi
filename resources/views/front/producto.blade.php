@extends('layouts.guest')

@section('title', __('Productos'))

@section('content')
    <div>
        <div class="relative overflow-hidden text-[#727777] h-[200px] bg-[#F0F0F0]">
            <div class="absolute hidden lg:block inset-0 top-6 w-[90%] max-w-[1224px] mx-auto z-20 text-xs">
                <div>
                    <div class="flex gap-1">
                        <a href="{{ route('home') }}" class="font-bold hover:underline">{{ __('Inicio') }}</a>
                        <span> / </span>
                        <a href="{{ route('categorias') }}" class=" font-bold hover:underline">{{ __('Productos') }}</a>
                        <span> / </span>
                        <a href="{{ route('producto', ['categoria' => $categoria->id]) }}"
                            class=" font-bold hover:underline">{{ $categoria->titulo }}</a>
                        @if ($producto)
                            <span> / </span>
                            <a href="{{ route('producto', ['categoria' => $categoria->id, 'producto' => $producto->id]) }}"
                                class=" font-light hover:underline">{{ $producto->titulo }}</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="absolute inset-0 w-[90%] max-w-[1224px] mx-auto flex items-center  h-full">
                <div class="flex flex-col text-center gap-1">
                    <h2 class="text-[38px] font-bold text-black mt-28 mb-4">{{ $categoria->titulo }}</h2>
                </div>
            </div>
        </div>
        <div class="py-20 w-[90%] max-w-[1224px] mx-auto flex flex-col lg:flex-row gap-6 text-black">
            <!-- Sidebar -->
            <div class="lg:w-1/4 flex flex-col gap-3">
                <h3 class="font-semibold">CATEGORÍA</h3>
                <div class="border-y border-[#DEDFE0] flex flex-col divide-y divide-[#DEDFE0]">
                    @foreach ($categorias as $cat)
                        <div>
                            <div class="py-2 flex justify-between w-full items-center">
                                <p
                                    class="{{ $cat->id === $categoria->id ? 'text-main-color font-bold' : 'hover:text-main-color' }} transition-colors">
                                    {{ $cat->titulo }}
                                </p>
                                <button onclick="toggleCategory({{ $cat->id }})"
                                    class="cursor-pointer transition-transform duration-200">
                                    <svg id="arrow-down-{{ $cat->id }}" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        class="{{ $cat->id === $categoria->id ? 'hidden' : 'block' }}">
                                        <path d="M6 9L12 15L18 9" stroke="#727777" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <svg id="arrow-up-{{ $cat->id }}" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        class="{{ $cat->id === $categoria->id ? 'block' : 'hidden' }}">
                                        <path d="M18 15L12 9L6 15" stroke="#727777" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                            <!-- Lista de productos desplegable -->
                            @if ($cat->productos && $cat->productos->count() > 0)
                                <div id="productos-{{ $cat->id }}"
                                    class="{{ $cat->id === $categoria->id ? 'block' : 'hidden' }} transition-all duration-300 ease-in-out">
                                    <div class="pb-2">
                                        @foreach ($cat->productos as $prod)
                                            <a href="{{ route('producto', ['categoria' => $cat->id, 'producto' => $prod->id]) }}"
                                                class="block text-sm {{ $producto && $prod->id === $producto->id ? 'font-bold' : 'hover:text-main-color' }} transition-colors">
                                                {{ $prod->titulo }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Contenido del producto -->
            <div class="lg:w-3/4 flex flex-col gap-40">
                <div class="flex flex-col lg:flex-row gap-6">
                    <div class="w-full lg:w-1/2">
                        <img src="{{ $producto->path }}" alt="{{ $producto->titulo }}"
                            class="w-full h-[460px] object-cover rounded-[10px]">
                    </div>
                    <div class="flex flex-col justify-between lg:w-1/2">
                        <div class="flex flex-col gap-5">
                            <h2 class="font-bold text-[28px]">{{ $producto->titulo }}</h2>
                            <div class="custom-summernote" style="line-height: 26px;">
                                {!! $producto->descripcion !!}
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('presupuesto') }}" class="btn-rojo w-full">
                                Solicitar Presupuesto
                            </a>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-6">
                    <h3 class="text-2xl font-semibold">Galería de imágenes</h3>
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        @foreach ($producto->galeria as $imagen)
                            <div>
                                <img src="{{ asset('storage/' . $imagen->path) }}" alt="Imagen del producto"
                                    class="w-full h-[288px] object-cover rounded-[10px]">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function toggleCategory(categoryId) {
            const productosDiv = document.getElementById('productos-' + categoryId);
            const arrowDown = document.getElementById('arrow-down-' + categoryId);
            const arrowUp = document.getElementById('arrow-up-' + categoryId);

            if (productosDiv.classList.contains('hidden')) {
                // Mostrar productos
                productosDiv.classList.remove('hidden');
                productosDiv.classList.add('block');
                arrowDown.classList.add('hidden');
                arrowDown.classList.remove('block');
                arrowUp.classList.remove('hidden');
                arrowUp.classList.add('block');
            } else {
                // Ocultar productos
                productosDiv.classList.add('hidden');
                productosDiv.classList.remove('block');
                arrowDown.classList.remove('hidden');
                arrowDown.classList.add('block');
                arrowUp.classList.add('hidden');
                arrowUp.classList.remove('block');
            }
        }
    </script>
@endsection
