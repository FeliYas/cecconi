@props(['logos', 'contactos', 'redes'])

<footer class="text-white">
    <div class="bg-[#131313]">
        <div
            class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-6 justify-between w-[90%] xl:max-w-[1224px] mx-auto py-20">
            <!-- Logo - 2 columnas -->
            <div
                class="lg:col-span-3 flex flex-col items-center md:items-center justify-center lg:justify-start gap-10 w-full lg:w-max">
                <img src="{{ asset($logos[0]->path) }}" alt="logo" class="object-contain h-[66px] ">
            </div>

            <!-- Secciones - 2 columnas -->
            <div class="lg:col-span-2 text-center lg:text-left flex flex-col gap-6">
                <h3 class="font-bold text-xl">{{ __('Secciones') }}</h3>
                <div class="flex flex-row md:pr-4 justify-center gap-6 md:gap-0 lg:justify-between lg:items-left">
                    <div class="flex flex-col gap-y-2">
                        <a href="{{ route('nosotros') }}"
                            class="opacity-80 hover:opacity-100 transition-colors duration-300">{{ __('Nosotros') }}</a>
                        <a href="{{ route('categorias') }}"
                            class="opacity-80 hover:opacity-100 transition-colors duration-300">{{ __('Productos') }}</a>
                        <a href="{{ route('accesorios') }}"
                            class="opacity-80 hover:opacity-100 transition-colors duration-300">{{ __('Accesorios') }}</a>
                        <a href="{{ route('novedades') }}"
                            class="opacity-80 hover:opacity-100 transition-colors duration-300">{{ __('Novedades') }}</a>
                        <a href="{{ route('clientes') }}"
                            class="opacity-80 hover:opacity-100 transition-colors duration-300">{{ __('Clientes') }}</a>
                        <a href="{{ route('contacto') }}"
                            class="opacity-80 hover:opacity-100 transition-colors duration-300">{{ __('Contacto') }}</a>
                    </div>
                </div>
            </div>

            <!-- Newsletter y Redes - 4 columnas -->
            <div class="lg:col-span-4 flex flex-col items-center lg:items-start text-center lg:text-start gap-7">
                <div class="flex flex-col items-center lg:items-start text-center lg:text-start gap-6 ">
                    <div>
                        <h3 class="font-bold text-xl lg:w-[260px]">{{ __('Suscribite al Newsletter') }}
                        </h3>
                    </div>
                    <form id="newsletterForm" class="w-full h-[45px] flex flex-col items-center lg:items-start">
                        @csrf
                        <div
                            class="w-[288px] h-[40px] border border-[#DCDCDC] flex justify-between rounded-[10px] text-sm">
                            <input type="email" name="email" placeholder="{{ __('Email') }}"
                                class="bg-transparent border-none outline-none p-3 w-full rounded-[10px]" required>
                            <button type="submit"
                                class="flex items-center justify-center rounded-r-[20px] px-3 cursor-pointer transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="#E30412" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                        <div id="newsletterMessage" class="text-xs mt-2"></div>
                    </form>
                </div>
                <div class="flex flex-col gap-2">
                    <div>
                        <h3 class="font-bold text-xl lg:w-[260px]">{{ __('Redes Sociales') }}
                        </h3>
                    </div>
                    <div class="flex gap-2 lg:justify-start justify-center">
                        @if ($redes->facebook)
                            <a href="{{ $redes->facebook }}"
                                class="group hover:text-[#E30412] transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M18 2H15C13.6739 2 12.4021 2.52678 11.4645 3.46447C10.5268 4.40215 10 5.67392 10 7V10H7V14H10V22H14V14H17L18 10H14V7C14 6.73478 14.1054 6.48043 14.2929 6.29289C14.4804 6.10536 14.7348 6 15 6H18V2Z"
                                        fill="currentColor" />
                                </svg>
                            </a>
                        @endif
                        @if ($redes->instagram)
                            <a href="{{ $redes->instagram }}"
                                class="group hover:text-[#E30412] transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M17.5 6.5H17.51M7 2H17C19.7614 2 22 4.23858 22 7V17C22 19.7614 19.7614 22 17 22H7C4.23858 22 2 19.7614 2 17V7C2 4.23858 4.23858 2 7 2ZM16 11.37C16.1234 12.2022 15.9813 13.0522 15.5938 13.799C15.2063 14.5458 14.5931 15.1514 13.8416 15.5297C13.0901 15.9079 12.2384 16.0396 11.4078 15.9059C10.5771 15.7723 9.80976 15.3801 9.21484 14.7852C8.61992 14.1902 8.22773 13.4229 8.09407 12.5922C7.9604 11.7616 8.09207 10.9099 8.47033 10.1584C8.84859 9.40685 9.45419 8.79374 10.201 8.40624C10.9478 8.01874 11.7978 7.87659 12.63 8C13.4789 8.12588 14.2649 8.52146 14.8717 9.12831C15.4785 9.73515 15.8741 10.5211 16 11.37Z"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        @endif
                        @if ($redes->tiktok)
                            <a href="{{ $redes->tiktok }}"
                                class="group hover:text-[#E30412] transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                    viewBox="0 0 28 28">
                                    <path fill="currentColor"
                                        d="M16.6 5.82s.51.5 0 0A4.28 4.28 0 0 1 15.54 3h-3.09v12.4a2.59 2.59 0 0 1-2.59 2.5c-1.42 0-2.6-1.16-2.6-2.6c0-1.72 1.66-3.01 3.37-2.48V9.66c-3.45-.46-6.47 2.22-6.47 5.64c0 3.33 2.76 5.7 5.69 5.7c3.14 0 5.69-2.55 5.69-5.7V9.01a7.35 7.35 0 0 0 4.3 1.38V7.3s-1.88.09-3.24-1.48" />
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="lg:col-span-3 flex flex-col items-center lg:items-start gap-6">
                <div class="text-left w-full">
                    <h3 class="font-bold text-xl text-center lg:text-left">{{ __('Contacto') }}
                    </h3>
                </div>
                <div class="flex flex-col gap-4 items-center lg:items-start justify-center text-center lg:text-left">
                    @foreach ($contactos as $contacto)
                        @if ($contacto->direccion)
                            <a href="https://maps.google.com/?q={{ urlencode($contacto->direccion) }}" target="_blank"
                                class="block no-underline text-inherit hover:text-main-color transition-colors duration-300">
                                <div class="flex gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none" class="w-10 h-10">
                                        <path
                                            d="M16.6667 8.33341C16.6667 13.3334 10 18.3334 10 18.3334C10 18.3334 3.33334 13.3334 3.33334 8.33341C3.33334 6.5653 4.03572 4.86961 5.28596 3.61937C6.53621 2.36913 8.2319 1.66675 10 1.66675C11.7681 1.66675 13.4638 2.36913 14.7141 3.61937C15.9643 4.86961 16.6667 6.5653 16.6667 8.33341Z"
                                            stroke="#E30412" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M10 10.8333C11.3807 10.8333 12.5 9.71396 12.5 8.33325C12.5 6.95254 11.3807 5.83325 10 5.83325C8.61929 5.83325 7.5 6.95254 7.5 8.33325C7.5 9.71396 8.61929 10.8333 10 10.8333Z"
                                            stroke="#E30412" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <p class="hover:text-[#E30412] transition-colors duration-300">
                                        {{ $contacto->direccion }}
                                    </p>
                                </div>
                            </a>
                        @endif
                        @if ($contacto->telefono)
                            <a href="tel:{{ preg_replace('/\s+/', '', $contacto->telefono) }}"
                                class="block no-underline text-inherit hover:text-main-color transition-colors duration-300">
                                <div class="flex gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <g clip-path="url(#clip0_7247_61)">
                                            <path
                                                d="M18.3333 14.0999V16.5999C18.3343 16.832 18.2867 17.0617 18.1937 17.2744C18.1008 17.487 17.9644 17.6779 17.7934 17.8348C17.6224 17.9917 17.4205 18.1112 17.2006 18.1855C16.9808 18.2599 16.7478 18.2875 16.5167 18.2666C13.9523 17.988 11.4892 17.1117 9.32498 15.7083C7.31151 14.4288 5.60443 12.7217 4.32499 10.7083C2.91663 8.53426 2.04019 6.05908 1.76665 3.48325C1.74583 3.25281 1.77321 3.02055 1.84707 2.80127C1.92092 2.58199 2.03963 2.38049 2.19562 2.2096C2.35162 2.03871 2.54149 1.90218 2.75314 1.80869C2.9648 1.7152 3.1936 1.6668 3.42499 1.66658H5.92499C6.32941 1.6626 6.72148 1.80582 7.02812 2.06953C7.33476 2.33324 7.53505 2.69946 7.59165 3.09992C7.69717 3.89997 7.89286 4.68552 8.17499 5.44158C8.2871 5.73985 8.31137 6.06401 8.24491 6.37565C8.17844 6.68729 8.02404 6.97334 7.79998 7.19992L6.74165 8.25825C7.92795 10.3445 9.65536 12.072 11.7417 13.2583L12.8 12.1999C13.0266 11.9759 13.3126 11.8215 13.6243 11.755C13.9359 11.6885 14.26 11.7128 14.5583 11.8249C15.3144 12.107 16.0999 12.3027 16.9 12.4083C17.3048 12.4654 17.6745 12.6693 17.9388 12.9812C18.203 13.2931 18.3435 13.6912 18.3333 14.0999Z"
                                                stroke="#E30412" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_7247_61">
                                                <rect width="20" height="20" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    <p class="hover:text-[#E30412] transition-colors duration-300">
                                        {{ $contacto->telefono }}
                                    </p>
                                </div>
                            </a>
                        @endif
                        @if ($contacto->email)
                            <a href="mailto:{{ $contacto->email }}"
                                class="block no-underline text-inherit hover:text-main-color transition-colors duration-300">
                                <div class="flex gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M16.6667 3.33325H3.33332C2.41285 3.33325 1.66666 4.07944 1.66666 4.99992V14.9999C1.66666 15.9204 2.41285 16.6666 3.33332 16.6666H16.6667C17.5871 16.6666 18.3333 15.9204 18.3333 14.9999V4.99992C18.3333 4.07944 17.5871 3.33325 16.6667 3.33325Z"
                                            stroke="#E30412" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M18.3333 5.83325L10.8583 10.5833C10.601 10.7444 10.3036 10.8299 9.99999 10.8299C9.69639 10.8299 9.39893 10.7444 9.14166 10.5833L1.66666 5.83325"
                                            stroke="#E30412" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <p class="hover:text-[#E30412] transition-colors duration-300">
                                        {{ $contacto->email }}
                                    </p>
                                </div>
                            </a>
                        @endif
                        @if ($contacto->whatsapp)
                            <a href="https://wa.me/{{ preg_replace('/\D/', '', $contacto->whatsapp) }}"
                                class="block no-underline text-inherit hover:text-main-color transition-colors duration-300">
                                <div class="flex gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <path
                                            d="M17 2.91005C16.0831 1.98416 14.991 1.25002 13.7875 0.750416C12.584 0.250812 11.2931 -0.00426317 9.99 5.38951e-05C4.53 5.38951e-05 0.0800002 4.45005 0.0800002 9.91005C0.0800002 11.6601 0.54 13.3601 1.4 14.8601L0 20.0001L5.25 18.6201C6.7 19.4101 8.33 19.8301 9.99 19.8301C15.45 19.8301 19.9 15.3801 19.9 9.92005C19.9 7.27005 18.87 4.78005 17 2.91005ZM9.99 18.1501C8.51 18.1501 7.06 17.7501 5.79 17.0001L5.49 16.8201L2.37 17.6401L3.2 14.6001L3 14.2901C2.17755 12.9771 1.74092 11.4593 1.74 9.91005C1.74 5.37005 5.44 1.67005 9.98 1.67005C12.18 1.67005 14.25 2.53005 15.8 4.09005C16.5676 4.85392 17.1759 5.7626 17.5896 6.76338C18.0033 7.76417 18.2142 8.83714 18.21 9.92005C18.23 14.4601 14.53 18.1501 9.99 18.1501ZM14.51 11.9901C14.26 11.8701 13.04 11.2701 12.82 11.1801C12.59 11.1001 12.43 11.0601 12.26 11.3001C12.09 11.5501 11.62 12.1101 11.48 12.2701C11.34 12.4401 11.19 12.4601 10.94 12.3301C10.69 12.2101 9.89 11.9401 8.95 11.1001C8.21 10.4401 7.72 9.63005 7.57 9.38005C7.43 9.13005 7.55 9.00005 7.68 8.87005C7.79 8.76005 7.93 8.58005 8.05 8.44005C8.17 8.30005 8.22 8.19005 8.3 8.03005C8.38 7.86005 8.34 7.72005 8.28 7.60005C8.22 7.48005 7.72 6.26005 7.52 5.76005C7.32 5.28005 7.11 5.34005 6.96 5.33005H6.48C6.31 5.33005 6.05 5.39005 5.82 5.64005C5.6 5.89005 4.96 6.49005 4.96 7.71005C4.96 8.93005 5.85 10.1101 5.97 10.2701C6.09 10.4401 7.72 12.9401 10.2 14.0101C10.79 14.2701 11.25 14.4201 11.61 14.5301C12.2 14.7201 12.74 14.6901 13.17 14.6301C13.65 14.5601 14.64 14.0301 14.84 13.4501C15.05 12.8701 15.05 12.3801 14.98 12.2701C14.91 12.1601 14.76 12.1101 14.51 11.9901Z"
                                            fill="#E30412" />
                                    </svg>
                                    <p class="hover:text-[#E30412] transition-colors duration-300">
                                        {{ $contacto->whatsapp }}
                                    </p>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="bg-[#080808]  py-5 text-sm">
            <div
                class="flex flex-col lg:flex-row text-center lg:text-left justify-between gap-6 items-center w-[90%] max-w-[1224px] mx-auto">
                <p>{{ __('© Copyright 2025 Cecconi S.A. Todos los derechos reservados') }}</p>
                <p>{{ __('By') }}
                    <a href="https://osole.com.ar/#"
                        class="underline hover:text-[#E30412] transition-colors duration-300">
                        Osole
                    </a>
                </p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('newsletterForm');
            const messageDiv = document.getElementById('newsletterMessage');
            if (form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    const email = this.querySelector('input[name="email"]').value;
                    messageDiv.innerHTML = '<span class="text-blue-300">{{ __('Enviando...') }}</span>';
                    axios.post('{{ route('newsletter.store') }}', {
                            email,
                            _token: token
                        })
                        .then(function() {
                            messageDiv.innerHTML =
                                '<span class="text-green-500">{{ __('Suscripción exitosa') }}</span>';
                            form.reset();
                            setTimeout(() => {
                                messageDiv.innerHTML = '';
                            }, 3000);
                        })
                        .catch(function(error) {
                            let msg = '<span class="text-red-500">';
                            if (error.response?.data?.message) msg += error.response.data.message;
                            else if (error.request) msg += 'No se recibió respuesta del servidor';
                            else msg += 'Error al enviar la solicitud';
                            msg += '</span>';
                            messageDiv.innerHTML = msg;
                            setTimeout(() => {
                                messageDiv.innerHTML = '';
                            }, 3000);
                        });
                });
            }
        });
    </script>
</footer>
