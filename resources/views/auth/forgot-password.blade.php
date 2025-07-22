<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FYMK5003LT"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-FYMK5003LT');
    </script>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Redefinir Senha</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-white">
    <div class="flex flex-col md:flex-row h-screen">

        <!-- Lado Esquerdo com Imagem -->
        <div class="relative w-full md:w-1/2 hidden md:flex items-center justify-center text-white">
            <img src="{{ asset('images/8.jpg') }}" alt="Imagem" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-orange-600 opacity-60"></div>
            <div class="absolute px-6 text-center">
                <h1 class="text-4xl font-bold tracking-tight">Esqueceu a Senha?</h1>
                <p class="mt-2 text-lg font-mono">Enviaremos instruções de recuperação</p>
            </div>
        </div>

        <!-- Lado Direito com Formulário -->
        <div class="w-full md:w-1/2 flex items-center justify-center p-8">
            <div class="w-full max-w-md space-y-8">
                <div class="text-center mb-6">
                    <img src="{{ asset('images/logo.png') }}" class="mx-auto h-16" alt="Logo">
                    <h2 class="text-2xl font-bold text-gray-800">Redefinir sua Senha</h2>
                    <p class="mt-2 text-sm text-gray-600">
                        Esqueceu sua senha? Informe seu e-mail e enviaremos um link de redefinição.
                    </p>
                </div>

                <!-- Sessão -->
                @if (session('status'))
                    <div class="bg-green-100 text-green-800 text-sm px-4 py-2 rounded">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Formulário -->
                <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                    @csrf

                    <!-- Email -->
                    <div>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required
                            placeholder="Digite seu e-mail"
                            class="w-full border-b border-gray-300 focus:border-orange-500 bg-transparent py-2 text-sm focus:outline-none" />
                        <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-500 text-xs" />
                    </div>

                    <!-- Botão -->
                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-orange-600 hover:bg-orange-700 text-white px-5 py-2 rounded-md text-sm font-medium transition">
                            Enviar link de recuperação
                        </button>
                    </div>

                    <div class="text-sm text-center text-gray-600 mt-4">
                        <a href="{{ route('login') }}" class="hover:text-orange-600">Voltar para login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
