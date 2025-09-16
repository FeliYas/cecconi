@extends('layouts.guest')

@section('title', __('Accesorios'))

@section('content')
    <div>
        <div class="relative overflow-hidden text-[#727777] h-[200px] bg-[#F0F0F0]">
            <div class="absolute hidden lg:block inset-0 top-6 w-[90%] max-w-[1224px] mx-auto z-20 text-xs">
                <div>
                    <div class="flex gap-1">
                        <a href="{{ route('home') }}" class="font-bold hover:underline">{{ __('Inicio') }}</a>
                        <span> / </span>
                        <a href="{{ route('accesorios') }}" class="font-light hover:underline">{{ __('Accesorios') }}</a>
                        @if ($categoriaSeleccionada)
                            <span> / </span>
                            <span class="font-light">{{ $categoriaSeleccionada->titulo }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="absolute inset-0 w-[90%] max-w-[1224px] mx-auto flex items-center h-full">
                <div class="flex flex-col text-center gap-1">
                    <h2 class="text-[38px] font-bold text-black mt-28 mb-4">
                        {{ $categoriaSeleccionada ? $categoriaSeleccionada->titulo : 'Accesorios' }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="py-20 w-[90%] max-w-[1224px] mx-auto flex flex-col lg:flex-row gap-6 text-black">
            <!-- Sidebar -->
            <div class="lg:w-1/4 flex flex-col gap-4">
                <!-- Buscador -->
                <div class="relative">
                    <input type="text" id="searchInput" placeholder="Buscar..."
                        class="w-full h-[48px] px-4 py-2 pr-10 border border-[#DEDFE0] rounded-lg focus:outline-none focus:border-main-color text-sm">
                    <div class="bg-main-color flex items-center justify-center h-[48px] w-[48px] rounded-r-lg absolute right-0 top-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M15.5 14H14.71L14.43 13.73C15.4439 12.554 16.0011 11.0527 16 9.5C16 8.21442 15.6188 6.95772 14.9046 5.8888C14.1903 4.81988 13.1752 3.98676 11.9874 3.49479C10.7997 3.00282 9.49279 2.87409 8.23192 3.1249C6.97104 3.3757 5.81285 3.99477 4.90381 4.90381C3.99477 5.81285 3.3757 6.97104 3.1249 8.23192C2.87409 9.49279 3.00282 10.7997 3.49479 11.9874C3.98676 13.1752 4.81988 14.1903 5.8888 14.9046C6.95772 15.6188 8.21442 16 9.5 16C11.11 16 12.59 15.41 13.73 14.43L14 14.71V15.5L19 20.49L20.49 19L15.5 14ZM9.5 14C7.01 14 5 11.99 5 9.5C5 7.01 7.01 5 9.5 5C11.99 5 14 7.01 14 9.5C14 11.99 11.99 14 9.5 14Z" fill="white"/>
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
                            <p class="{{ !$categoriaSeleccionada ? 'text-main-color font-bold' : '' }}">
                                Todos los accesorios
                            </p>
                        </a>

                        @foreach ($categorias as $cat)
                            <a href="{{ route('accesorios', ['categoria' => $cat->id]) }}"
                                class="py-1 px-2 flex justify-between w-full items-center hover:bg-gray-50 transition-colors categoria-item"
                                data-search="{{ strtolower($cat->titulo) }}">
                                <p
                                    class="{{ $categoriaSeleccionada && $categoriaSeleccionada->id === $cat->id ? 'text-main-color font-bold' : '' }}">
                                    {{ $cat->titulo }}
                                </p>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Tarjetas de accesorios -->
            <div class="lg:w-3/4">
                @if ($accesorios->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($accesorios as $acc)
                            <a href="{{ route('accesorio', $acc->id) }}"
                                class="h-[392px] relative group border border-[#DEDFE0] rounded-[10px] overflow-hidden hover:shadow-lg transition-shadow duration-300 accesorio-card"
                                data-search="{{ strtolower($acc->titulo . ' ' . ($acc->categoria ? $acc->categoria->titulo : '')) }}">
                                <img src="{{ $acc->path }}" alt="{{ $acc->titulo }} Image"
                                    class="h-[288px] w-full object-cover rounded-t-[10px] bg-[#F5F5F5]">
                                <div
                                    class="h-[288px] opacity-0 group-hover:opacity-30 pointer-events-none group-hover:pointer-events-auto transition-opacity duration-300 absolute inset-0 bg-black rounded-t-[10px]">
                                </div>
                                <div class="h-[104px] py-3 px-4 flex flex-col gap-1.5">
                                    @if ($acc->categoria)
                                        <p class="font-bold text-sm text-main-color uppercase">
                                            {{ $acc->categoria->titulo }}</p>
                                    @endif
                                    <p class="font-semibold text-lg text-black uppercase">{{ $acc->titulo }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="flex items-center justify-center h-64 bg-gray-50 rounded-lg">
                        <p class="text-gray-500">No se encontraron accesorios en esta categoría</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script>
        // Función de búsqueda
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();

            // Filtrar categorías
            const categorias = document.querySelectorAll('.categoria-item');
            categorias.forEach(cat => {
                const text = cat.getAttribute('data-search');
                if (text.includes(searchTerm)) {
                    cat.style.display = 'flex';
                } else {
                    cat.style.display = 'none';
                }
            });

            // Filtrar tarjetas de accesorios
            const accesorios = document.querySelectorAll('.accesorio-card');
            let visibleCount = 0;
            accesorios.forEach(acc => {
                const text = acc.getAttribute('data-search');
                if (text.includes(searchTerm)) {
                    acc.style.display = 'block';
                    visibleCount++;
                } else {
                    acc.style.display = 'none';
                }
            });

            // Mostrar mensaje si no hay resultados
            const grid = document.querySelector('.grid');
            if (grid && visibleCount === 0 && searchTerm.length > 0) {
                if (!document.getElementById('no-results')) {
                    const noResults = document.createElement('div');
                    noResults.id = 'no-results';
                    noResults.className =
                        'col-span-full flex items-center justify-center h-64 bg-gray-50 rounded-lg';
                    noResults.innerHTML = '<p class="text-gray-500">No se encontraron resultados para "' +
                        searchTerm + '"</p>';
                    grid.appendChild(noResults);
                }
            } else {
                const noResults = document.getElementById('no-results');
                if (noResults) {
                    noResults.remove();
                }
            }
        });
    </script>
@endsection
