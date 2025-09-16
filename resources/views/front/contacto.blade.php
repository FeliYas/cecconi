@extends('layouts.guest')
@section('meta')
    <meta name="{{ $metadatos->seccion }}" content="{{ $metadatos->keyword }}">
@endsection

@section('title', __('Contacto'))

@section('content')
    <div>
        <div class="relative overflow-hidden text-[#727777] h-[200px] bg-[#F0F0F0]">
            <div class="absolute hidden lg:block inset-0 top-6 w-[90%] max-w-[1224px] mx-auto z-20 text-xs">
                <div>
                    <div class="flex gap-1">
                        <a href="{{ route('home') }}" class="font-bold hover:underline">{{ __('Inicio') }}</a>
                        <span> / </span>
                        <a href="{{ route('contacto') }}" class=" font-light hover:underline">{{ __('Contacto') }}</a>
                    </div>
                </div>
            </div>
            <div class="absolute inset-0 w-[90%] max-w-[1224px] mx-auto flex items-center  h-full">
                <div class="flex flex-col text-center gap-1">
                    <h2 class="text-[38px] font-bold text-black mt-28 mb-4">Contacto</h2>
                </div>
            </div>
        </div>

        <!-- Mensajes de feedback -->
        @if (session('success'))
            <div id="successMessage"
                class="fixed top-6 right-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded z-50 shadow-lg transition-opacity duration-500 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"></path>
                </svg>
                <span>{{ __(session('success')) }}</span>
                <button type="button" class="ml-auto" onclick="document.getElementById('successMessage').remove()">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <script>
                setTimeout(function() {
                    const message = document.getElementById('successMessage');
                    if (message) {
                        message.style.opacity = '0';
                        setTimeout(() => message.remove(), 500);
                    }
                }, 5000);
            </script>
        @endif
        @if (session('error'))
            <div id="errorMessage"
                class="fixed top-6 right-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded z-50 shadow-lg transition-opacity duration-500 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
                <span>{{ __(session('error')) }}</span>
                <button type="button" class="ml-auto" onclick="document.getElementById('errorMessage').remove()">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <script>
                setTimeout(function() {
                    const message = document.getElementById('errorMessage');
                    if (message) {
                        message.style.opacity = '0';
                        setTimeout(() => message.remove(), 500);
                    }
                }, 5000);
            </script>
        @endif
        @if ($errors->any())
            <div id="validationErrors"
                class="fixed top-6 right-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded z-50 shadow-lg transition-opacity duration-500">
                <div class="flex items-center mb-2">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="font-bold">{{ __('Por favor corrija los siguientes errores:') }}</span>
                    <button type="button" class="ml-auto" onclick="document.getElementById('validationErrors').remove()">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ __($error) }}</li>
                    @endforeach
                </ul>
            </div>
            <script>
                setTimeout(function() {
                    const message = document.getElementById('validationErrors');
                    if (message) {
                        message.style.opacity = '0';
                        setTimeout(() => message.remove(), 500);
                    }
                }, 7000);
            </script>
        @endif

        <div class="bg-white py-20 flex flex-col w-[90%] max-w-[1224px] mx-auto text-black">
            <div class="flex flex-col lg:flex-row gap-15">
                <div class="flex flex-col gap-5 lg:w-1/3 ">
                    <a href="https://maps.google.com/?q={{ urlencode($contacto->direccion) }}" target="_blank"
                        class="block no-underline text-inherit hover:text-main-color transition-colors duration-300">
                        <div class="flex gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="none" class="w-8 h-8">
                                <path
                                    d="M16.6667 8.33341C16.6667 13.3334 10 18.3334 10 18.3334C10 18.3334 3.33334 13.3334 3.33334 8.33341C3.33334 6.5653 4.03572 4.86961 5.28596 3.61937C6.53621 2.36913 8.2319 1.66675 10 1.66675C11.7681 1.66675 13.4638 2.36913 14.7141 3.61937C15.9643 4.86961 16.6667 6.5653 16.6667 8.33341Z"
                                    stroke="#E30412" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M10 10.8333C11.3807 10.8333 12.5 9.71396 12.5 8.33325C12.5 6.95254 11.3807 5.83325 10 5.83325C8.61929 5.83325 7.5 6.95254 7.5 8.33325C7.5 9.71396 8.61929 10.8333 10 10.8333Z"
                                    stroke="#E30412" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="hover:text-[#E30412] transition-colors duration-300">
                                {{ $contacto->direccion }}
                            </p>
                        </div>
                    </a>
                    <a href="mailto:{{ $contacto->email }}"
                        class="block no-underline text-inherit hover:text-main-color transition-colors duration-300">
                        <div class="flex gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="none">
                                <path
                                    d="M16.667 3.33333H3.33366C2.41318 3.33333 1.66699 4.07952 1.66699 4.99999V15C1.66699 15.9205 2.41318 16.6667 3.33366 16.6667H16.667C17.5875 16.6667 18.3337 15.9205 18.3337 15V4.99999C18.3337 4.07952 17.5875 3.33333 16.667 3.33333Z"
                                    stroke="#E30412" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M18.3337 5.83333L10.8587 10.5833C10.6014 10.7445 10.3039 10.83 10.0003 10.83C9.69673 10.83 9.39927 10.7445 9.14199 10.5833L1.66699 5.83333"
                                    stroke="#E30412" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="hover:text-[#E30412] transition-colors duration-300">
                                {{ $contacto->email }}
                            </p>
                        </div>
                    </a>
                    <a href="tel:{{ preg_replace('/\s+/', '', $contacto->telefono) }}"
                        class="block no-underline text-inherit hover:text-main-color transition-colors duration-300">
                        <div class="flex gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="none">
                                <g clip-path="url(#clip0_7112_860)">
                                    <path
                                        d="M18.3332 14.1V16.6C18.3341 16.8321 18.2866 17.0618 18.1936 17.2745C18.1006 17.4871 17.9643 17.678 17.7933 17.8349C17.6222 17.9918 17.4203 18.1112 17.2005 18.1856C16.9806 18.2599 16.7477 18.2876 16.5165 18.2667C13.9522 17.988 11.489 17.1118 9.32486 15.7083C7.31139 14.4289 5.60431 12.7218 4.32486 10.7083C2.91651 8.53433 2.04007 6.05916 1.76653 3.48333C1.7457 3.25288 1.77309 3.02063 1.84695 2.80135C1.9208 2.58207 2.03951 2.38057 2.1955 2.20968C2.3515 2.03879 2.54137 1.90225 2.75302 1.80876C2.96468 1.71527 3.19348 1.66688 3.42486 1.66666H5.92486C6.32928 1.66268 6.72136 1.80589 7.028 2.0696C7.33464 2.33332 7.53493 2.69953 7.59153 3.09999C7.69705 3.90005 7.89274 4.6856 8.17486 5.44166C8.28698 5.73993 8.31125 6.06409 8.24478 6.37573C8.17832 6.68737 8.02392 6.97342 7.79986 7.19999L6.74153 8.25833C7.92783 10.3446 9.65524 12.072 11.7415 13.2583L12.7999 12.2C13.0264 11.9759 13.3125 11.8215 13.6241 11.7551C13.9358 11.6886 14.2599 11.7129 14.5582 11.825C15.3143 12.1071 16.0998 12.3028 16.8999 12.4083C17.3047 12.4654 17.6744 12.6693 17.9386 12.9812C18.2029 13.2931 18.3433 13.6913 18.3332 14.1Z"
                                        stroke="#E30412" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_7112_860">
                                        <rect width="20" height="20" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                            <p class="hover:text-[#E30412] transition-colors duration-300">
                                {{ $contacto->telefono }}
                            </p>
                        </div>
                    </a>
                    <a href="mailto:{{ $contacto->whatsapp }}"
                        class="block no-underline text-inherit hover:text-main-color transition-colors duration-300">
                        <div class="flex gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="none">
                                <path
                                    d="M17 2.91005C16.0831 1.98416 14.991 1.25002 13.7875 0.750416C12.584 0.250812 11.2931 -0.00426317 9.99 5.38951e-05C4.53 5.38951e-05 0.0800002 4.45005 0.0800002 9.91005C0.0800002 11.6601 0.54 13.3601 1.4 14.8601L0 20.0001L5.25 18.6201C6.7 19.4101 8.33 19.8301 9.99 19.8301C15.45 19.8301 19.9 15.3801 19.9 9.92005C19.9 7.27005 18.87 4.78005 17 2.91005ZM9.99 18.1501C8.51 18.1501 7.06 17.7501 5.79 17.0001L5.49 16.8201L2.37 17.6401L3.2 14.6001L3 14.2901C2.17755 12.9771 1.74092 11.4593 1.74 9.91005C1.74 5.37005 5.44 1.67005 9.98 1.67005C12.18 1.67005 14.25 2.53005 15.8 4.09005C16.5676 4.85392 17.1759 5.7626 17.5896 6.76338C18.0033 7.76417 18.2142 8.83714 18.21 9.92005C18.23 14.4601 14.53 18.1501 9.99 18.1501ZM14.51 11.9901C14.26 11.8701 13.04 11.2701 12.82 11.1801C12.59 11.1001 12.43 11.0601 12.26 11.3001C12.09 11.5501 11.62 12.1101 11.48 12.2701C11.34 12.4401 11.19 12.4601 10.94 12.3301C10.69 12.2101 9.89 11.9401 8.95 11.1001C8.21 10.4401 7.72 9.63005 7.57 9.38005C7.43 9.13005 7.55 9.00005 7.68 8.87005C7.79 8.76005 7.93 8.58005 8.05 8.44005C8.17 8.30005 8.22 8.19005 8.3 8.03005C8.38 7.86005 8.34 7.72005 8.28 7.60005C8.22 7.48005 7.72 6.26005 7.52 5.76005C7.32 5.28005 7.11 5.34005 6.96 5.33005H6.48C6.31 5.33005 6.05 5.39005 5.82 5.64005C5.6 5.89005 4.96 6.49005 4.96 7.71005C4.96 8.93005 5.85 10.1101 5.97 10.2701C6.09 10.4401 7.72 12.9401 10.2 14.0101C10.79 14.2701 11.25 14.4201 11.61 14.5301C12.2 14.7201 12.74 14.6901 13.17 14.6301C13.65 14.5601 14.64 14.0301 14.84 13.4501C15.05 12.8701 15.05 12.3801 14.98 12.2701C14.91 12.1601 14.76 12.1101 14.51 11.9901Z"
                                    fill="#E30412" />
                            </svg>
                            <p class="hover:text-[#E30412] transition-colors duration-300">
                                {{ $contacto->whatsapp }}
                            </p>
                        </div>
                    </a>
                </div>
                <div class="lg:w-2/3">
                    <form action="{{ route('contacto.enviar') }}" method="POST" class="w-full space-y-6"
                        id="contactForm">
                        @csrf
                        <div class="grid lg:grid-cols-2 gap-6">
                            <div class="w-full relative">
                                <label for="nombre" class="block mb-1">{{ __('Nombre y apellido') }} *</label>
                                <input type="text" name="nombre" id="nombre" required
                                    class="border border-[#DEDFE0] rounded-[8px] w-full h-12 px-4 focus:border-main-color focus:outline-none transition-colors">
                            </div>
                            <div class="w-full relative">
                                <label for="email" class="block mb-1">{{ __('E-mail') }} *</label>
                                <input type="text" name="email" id="email" required
                                    class="border border-[#DEDFE0] rounded-[8px] w-full h-12 px-4 focus:border-main-color focus:outline-none transition-colors">
                            </div>
                        </div>
                        <div class="grid lg:grid-cols-2 gap-6">
                            <div class="w-full relative">
                                <label for="telefono" class="block mb-1">{{ __('Telefono') }} *</label>
                                <input type="text" name="telefono" id="telefono" required
                                    class="border border-[#DEDFE0] rounded-[8px] w-full h-12 px-4 focus:border-main-color focus:outline-none transition-colors">
                            </div>
                            <div class="w-full relative">
                                <label for="empresa" class="block mb-1">{{ __('Empresa') }}</label>
                                <input type="text" name="empresa" id="empresa"
                                    class="border border-[#DEDFE0] rounded-[8px] w-full h-12 px-4 focus:border-main-color focus:outline-none transition-colors">
                            </div>
                        </div>
                        <div class="flex flex-col lg:flex-row gap-6">
                            <div class="w-full py-2 relative">
                                <label for="mensaje" class="block mb-1">{{ __('Mensaje') }} *</label>
                                <textarea name="mensaje" id="mensaje" cols="30" rows="10" required
                                    class="border border-[#DEDFE0] rounded-[8px] w-full px-4 py-2 h-[158px] focus:border-main-color focus:outline-none transition-colors"></textarea>
                            </div>
                            <div class="w-full flex items-end justify-between gap-10 lg:mb-3">
                                <span class="mb-4 text-sm">* Campos obligatorios</span>
                                <div class="mt-auto py-1 flex flex-col items-center justify-center ">
                                    <!-- Agregamos campo oculto para almacenar el token de reCAPTCHA -->
                                    <input type="hidden" name="g-recaptcha-response" id="recaptchaResponse">
                                    <button type="button" id="submitBtn" class="btn-rojo w-full lg:w-45 relative">
                                        <span id="submitText" class="inline-block">{{ __('Enviar mensaje') }}</span>
                                        <span id="loadingIndicator"
                                            class="hidden absolute inset-0 items-center justify-center">
                                            <svg class="animate-spin h-5 w-5 text-white"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                                    stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor"
                                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                </path>
                                            </svg>
                                            <span class="ml-2">{{ __('Enviando...') }}</span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="w-full h-[570px] rounded-[8px] overflow-hidden pt-20">
                {!! preg_replace(['/width="[^"]*"/', '/height="[^"]*"/'], ['width="100%"', 'height="100%"'], $mapa) !!}
            </div>
        </div>
    </div>

    <!-- Script de reCAPTCHA v3 -->
    <script src="https://www.google.com/recaptcha/api.js?render=6LdJbcorAAAAAIiDmcPijABugOMo8RLixxkiQgsb"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Agregar evento al botón de envío
            const submitBtn = document.getElementById('submitBtn');
            if (submitBtn) {
                submitBtn.addEventListener('click', handleSubmit);
            }

            function handleSubmit(e) {
                e.preventDefault();

                // Mostrar indicador de carga
                const submitText = document.getElementById('submitText');
                const loadingIndicator = document.getElementById('loadingIndicator');
                const submitBtn = document.getElementById('submitBtn');

                // Desactivar el botón y mostrar el indicador de carga
                submitBtn.disabled = true;
                submitText.style.visibility = 'hidden'; // Usar visibility en lugar de display
                loadingIndicator.classList.remove('hidden');
                loadingIndicator.classList.add('flex'); // Asegurar que se muestre como flex

                // Activar reCAPTCHA
                grecaptcha.ready(function() {
                    grecaptcha.execute('6LdJbcorAAAAAIiDmcPijABugOMo8RLixxkiQgsb', {
                        action: 'submit_contact'
                    }).then(function(token) {
                        // Guardar el token en el campo oculto
                        document.getElementById('recaptchaResponse').value = token;

                        // Enviar el formulario
                        submitBtn.closest('form').submit();
                    }).catch(function(error) {
                        // Restaurar el botón en caso de error
                        submitBtn.disabled = false;
                        submitText.style.visibility = 'visible'; // Restaurar visibilidad
                        loadingIndicator.classList.add('hidden');
                        loadingIndicator.classList.remove('flex');

                        console.error('Error de reCAPTCHA:', error);
                        alert('Error al procesar el formulario. Por favor, intenta nuevamente.');
                    });
                });
            }
        });
    </script>

    <style>
        /* Estilo para el placeholder */
        ::placeholder {
            color: #666 !important;
            opacity: 1;
        }

        /* Cuando el input está enfocado */
        input:focus::placeholder,
        textarea:focus::placeholder {
            opacity: 0.5;
        }

        /* Animación al enfocar los campos */
        input:focus,
        textarea:focus {
            border-color: #DCDCDC !important;
            box-shadow: 0 0 0 1px rgba(220, 220, 220, 0.2);
        }

        /* Estilo para los inputs con fondo transparente */
        input[type="text"],
        input[type="email"],
        textarea {
            background-color: transparent !important;
        }
    </style>
@endsection
