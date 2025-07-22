<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Analize de Viabilidade</title>




    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">




</head>

<body>

    <header id="navbar" class="fixed top-0 w-full z-10 transition-all duration-300">

        <div class="container space-x-5 mx-auto flex  justify-center items-center p-5 bg-transparent">
            <!-- ***** Logo ***** -->
            <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-800">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 ">
            </a>

            <!-- ***** Botão de Menu (Hamburguer) ***** -->
            <button id="menu-toggle" class="md:hidden text-white p-2 rounded focus:outline-none">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>

            <!-- ***** Menu de Navegação ***** -->
            <ul id="menu"
                class="hidden text-lg md:flex md:space-x-6 text-white
                md:static absolute top-16 left-0 w-full md:w-auto bg-[#14192D] md:bg-transparent
                shadow-md md:shadow-none md:flex-row flex-col items-center md:items-start py-4 md:py-0 text-center">
                <li><a href="{{ route('home') }}" class="block py-2 hover:text-orange-600">Início</a></li>
                <li><a href="{{ route('home') }}#Benefícios" class="block py-2 hover:text-orange-600">Benefícios</a></li>
                <li><a href="{{ route('home') }}#cursos" class="block py-2 hover:text-orange-600">Cursos</a></li>
                <li><a href="{{ route('home') }}#testimonials" class="block py-2 hover:text-orange-600">Testemunho</a></li>
                <li><a href="{{ route('quem_somos') }}#form" class="block py-2 hover:text-orange-600">Sobre Nós</a></li>
                <li><a href="{{ route('contacto') }}" class="block py-2 hover:text-orange-600">Entre em Contato</a></li>

                @auth
                    <li>
                        <a href="{{ url('/dashboard') }}"
                            class="px-4 py-2 border border-orange-500 rounded hover:border-orange-700">
                            Dashboard
                        </a>
                    </li>
                @else
                    <li><a href="{{ route('login') }}" class="block py-2 hover:text-orange-600">Login</a></li>

                    @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}" class="block py-2 hover:text-orange-600">
                                Registrar
                            </a>
                        </li>
                    @endif
                @endauth
            </ul>
        </div>
    </header>









    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/navbar.js') }}"></script>
</body>

</html>
