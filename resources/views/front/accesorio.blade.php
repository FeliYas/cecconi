@extends('layouts.guest')

@section('title', $accesorio->titulo)

@section('content')
    <div>
        <div class="relative overflow-hidden text-[#727777] h-[200px] bg-[#F0F0F0]">
            <div class="absolute hidden lg:block inset-0 top-6 w-[90%] max-w-[1224px] mx-auto z-20 text-xs">
                <div>
                    <div class="flex gap-1">
                        <a href="{{ route('home') }}" class="font-bold hover:underline">{{ __('Inicio') }}</a>
                        <span> / </span>
                        <a href="{{ route('accesorios') }}" class=" font-bold hover:underline">{{ __('Accesorios') }}</a>
                        <span> / </span>
                        <a href="{{ route('categorias', $categoriaSeleccionada->id) }}"
                            class=" font-bold hover:underline">{{ $categoriaSeleccionada->titulo }}</a>
                        <span> / </span>
                        <a href="{{ route('accesorio', $accesorio->id) }}"
                            class=" font-light hover:underline">{{ $accesorio->titulo }}</a>
                    </div>
                </div>
            </div>
            <div class="absolute inset-0 w-[90%] max-w-[1224px] mx-auto flex items-center  h-full">
                <div class="flex flex-col text-center gap-1">
                    <h2 class="text-[38px] font-bold text-black mt-28 mb-4">{{ __('Accesorios') }}</h2>
                </div>
            </div>
        </div>

        <div class="py-20 w-[90%] max-w-[1224px] mx-auto flex flex-col lg:flex-row gap-6 text-black">
            <!-- Sidebar -->
            <div class="lg:w-1/4 flex flex-col gap-4">
                <div class="relative">
                    <input type="text" id="searchInput" placeholder="Buscar..."
                        class="w-full h-[48px] px-4 py-2 pr-10 border border-[#DEDFE0] rounded-lg focus:outline-none focus:border-main-color text-sm">
                    <div
                        class="bg-main-color flex items-center justify-center h-[48px] w-[48px] rounded-r-lg absolute right-0 top-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M15.5 14H14.71L14.43 13.73C15.4439 12.554 16.0011 11.0527 16 9.5C16 8.21442 15.6188 6.95772 14.9046 5.8888C14.1903 4.81988 13.1752 3.98676 11.9874 3.49479C10.7997 3.00282 9.49279 2.87409 8.23192 3.1249C6.97104 3.3757 5.81285 3.99477 4.90381 4.90381C3.99477 5.81285 3.3757 6.97104 3.1249 8.23192C2.87409 9.49279 3.00282 10.7997 3.49479 11.9874C3.98676 13.1752 4.81988 14.1903 5.8888 14.9046C6.95772 15.6188 8.21442 16 9.5 16C11.11 16 12.59 15.41 13.73 14.43L14 14.71V15.5L19 20.49L20.49 19L15.5 14ZM9.5 14C7.01 14 5 11.99 5 9.5C5 7.01 7.01 5 9.5 5C11.99 5 14 7.01 14 9.5C14 11.99 11.99 14 9.5 14Z"
                                fill="white" />
                        </svg>
                    </div>
                </div>

                <!-- Categorías -->
                <div>
                    <div class="border-t border-[#DEDFE0] flex flex-col">
                        <!-- Opción para ver todos -->
                        <a href="{{ route('accesorios') }}"
                            class="py-1 px-2 flex justify-between w-full items-center hover:bg-gray-50 transition-colors categoria-item"
                            data-search="{{ strtolower('Todos los accesorios') }}">
                            <p class="text-[#727777]">
                                Todos los accesorios
                            </p>
                        </a>

                        @foreach ($categorias as $cat)
                            <div class="categoria-container" data-search="{{ strtolower($cat->titulo) }}">
                                <a href="{{ route('accesorios', ['categoria' => $cat->id]) }}"
                                    class="py-1 px-2 flex justify-between w-full items-center hover:bg-gray-50 transition-colors categoria-item">
                                    <p
                                        class="{{ $categoriaSeleccionada && $categoriaSeleccionada->id === $cat->id ? 'text-main-color font-bold' : 'text-[#727777]' }}">
                                        {{ $cat->titulo }}
                                    </p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Contenido del accesorio -->
            <div class="lg:w-3/4">
                <div class="flex flex-col gap-25">
                    <div class="flex flex-col gap-5">
                        <div class="flex flex-col lg:flex-row gap-6">
                            <div>
                                <img id="mainImage" src="{{ $accesorio->path }}" alt="{{ $accesorio->titulo }}"
                                    class="h-[393px] w-full lg:w-[393px] object-contain rounded-[6px] bg-[#F7F7F7] border border-[#DEDFE0] ">
                            </div>
                            <div class="flex flex-col justify-between w-full lg:w-7/12">
                                <div class="flex flex-col gap-7">
                                    <div class="flex flex-col gap-1">
                                        <p class="text-main-color font-bold uppercase">{{ $accesorio->categoria->titulo }}
                                        </p>
                                        <h3 class="text-[28px] font-bold">{{ $accesorio->titulo }}</h3>
                                        <hr class="border-[#DEDFE0]">
                                    </div>
                                    <div class="custom-summernote font-medium" style="line-height: 26px;">
                                        {!! $accesorio->descripcion !!}
                                    </div>
                                </div>
                                <div class="flex flex-col lg:flex-row gap-5 items-center">
                                    @if ($accesorio->ficha)
                                        <a href="{{ asset($accesorio->ficha) }}" target="_blank"
                                            class="btn-border w-full">Ficha técnica</a>
                                    @endif
                                    <a href="{{ route('presupuesto') }}" class="btn-rojo w-full">Solicitar presupuesto</a>
                                </div>
                            </div>
                        </div>
                        <div class="w-full lg:w-[393px] grid grid-cols-5 gap-3">
                            <img src="{{ asset($accesorio->path) }}" alt=""
                                class="h-[70px] w-full rounded-[6px] cursor-pointer gallery-thumb active-thumb"
                                onclick="changeMainImage('{{ asset($accesorio->path) }}')">
                            @foreach ($accesorio->galeria as $imagen)
                                <img src="{{ asset($imagen->path) }}" alt="Thumbnail {{ $loop->index + 1 }}"
                                    class="h-[70px] w-full rounded-[6px] cursor-pointer gallery-thumb"
                                    onclick="changeMainImage('{{ asset($imagen->path) }}')">
                            @endforeach
                        </div>
                    </div>
                    <div class="flex flex-col gap-5">
                        <h3 class="text-2xl font-semibold">Productos relacionados</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($accesoriosRelacionados as $accRel)
                                <a href="{{ route('accesorio', $accRel->id) }}"
                                    class="h-[392px] relative group border border-[#DEDFE0] rounded-[10px] overflow-hidden hover:shadow-lg transition-shadow duration-300 accesorio-card"
                                    data-search="{{ strtolower($accRel->titulo . ' ' . ($accRel->categoria ? $accRel->categoria->titulo : '')) }}">
                                    <img src="{{ asset($accRel->path) }}" alt="{{ $accRel->titulo }} Image"
                                        class="h-[288px] w-full object-cover rounded-t-[10px] bg-[#F5F5F5]">
                                    <div
                                        class="h-[288px] opacity-0 group-hover:opacity-30 pointer-events-none group-hover:pointer-events-auto transition-opacity duration-300 absolute inset-0 bg-black rounded-t-[10px]">
                                    </div>
                                    <div class="h-[104px] py-3 px-4 flex flex-col gap-1.5">
                                        @if ($accRel->categoria)
                                            <p class="font-bold text-sm text-main-color uppercase">
                                                {{ $accRel->categoria->titulo }}</p>
                                        @endif
                                        <p class="font-semibold text-lg text-black uppercase">{{ $accRel->titulo }}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        /* Estilo para la imagen activa/seleccionada */
        .active-thumb {
            border-color: #E30412 !important;
            border-width: 2px !important;
        }

        /* Efecto hover mejorado */
        .gallery-thumb:hover {
            transform: scale(1.02);
        }
    </style>
    <script>
        function toggleAccesorios(event, categoryId) {
            event.preventDefault();
            event.stopPropagation();

            const accesoriosDiv = document.getElementById('accesorios-' + categoryId);
            const arrowDown = document.getElementById('arrow-down-' + categoryId);
            const arrowUp = document.getElementById('arrow-up-' + categoryId);

            if (accesoriosDiv.classList.contains('hidden')) {
                accesoriosDiv.classList.remove('hidden');
                accesoriosDiv.classList.add('block');
                arrowDown.classList.add('hidden');
                arrowUp.classList.remove('hidden');
            } else {
                accesoriosDiv.classList.add('hidden');
                accesoriosDiv.classList.remove('block');
                arrowDown.classList.remove('hidden');
                arrowUp.classList.add('hidden');
            }
        }

        function changeMainImage(imageSrc) {
            // Cambiar la imagen principal
            const mainImage = document.getElementById('mainImage');
            mainImage.src = imageSrc;

            // Remover la clase active-thumb de todas las imágenes
            const thumbnails = document.querySelectorAll('.gallery-thumb');
            thumbnails.forEach(thumb => {
                thumb.classList.remove('active-thumb');
            });

            // Encontrar la imagen clickeada y agregarle la clase active-thumb
            const clickedImage = document.querySelector(`img[src="${imageSrc}"].gallery-thumb`);
            if (clickedImage) {
                clickedImage.classList.add('active-thumb');
            }
        }

        // Función de búsqueda
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();

            // Filtrar solo las categorías del sidebar
            document.querySelectorAll('.categoria-container').forEach(function(container) {
                const text = container.getAttribute('data-search');
                if (text.includes(searchTerm)) {
                    container.style.display = '';
                } else {
                    container.style.display = 'none';
                }
            });

            // También filtrar la opción "Todos los accesorios"
            const todosItem = document.querySelector('.categoria-item[data-search*="todos"]');
            if (todosItem) {
                const text = todosItem.getAttribute('data-search');
                if (text.includes(searchTerm)) {
                    todosItem.style.display = '';
                } else {
                    todosItem.style.display = 'none';
                }
            }
        });
    </script>
@endsection
