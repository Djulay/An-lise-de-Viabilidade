<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/typing.js') }}"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="flex flex-col md:flex-row h-screen">
        <!-- Imagem com filtro laranja + Texto Digitado -->
        <div class="relative w-full md:w-1/2 h-64 md:h-auto hidden md:flex items-center justify-center text-white">
            <img src="{{ asset('images/8.jpg') }}" alt="Imagem" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-orange-500 opacity-50"></div>

            <!-- Texto digitado -->
            <div class="absolute px-6 text-center">
                <h1 class="text-3xl font-bold">Bem-vindo</h1>
                <p id="typing-text" class="text-xl mt-2 font-mono"></p>
            </div>
        </div>

        <!-- Formulário de Cadastro -->

        <div class="w-full md:w-1/2  items-center justify-center p-8 bg-white">
            <div class="mt-10  ">
                <a class="" href="/">
                <img class=" " src="{{ asset('images/logo.png') }}" alt="">
                </a>
            </div>
            <div class="flex flex-col w-full items-center justify-center">
              
                {{ $slot }}
            </div>
        </div>
    </div>


</body>

</html>



