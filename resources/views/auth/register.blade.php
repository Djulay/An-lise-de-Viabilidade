<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">


    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-FYMK5003LT"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-FYMK5003LT');
</script>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Registrar</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/typing.js') }}"></script>
</head>

<body class="min-h-screen bg-white">
    <div class="flex flex-col md:flex-row h-screen">

        <!-- Lado Esquerdo com Imagem e filtro -->
        <div class="relative w-full md:w-1/2 hidden md:flex items-center justify-center text-white">
            <img src="{{ asset('images/8.jpg') }}" alt="Imagem" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-orange-600 opacity-60"></div>
            <div class="absolute px-6 text-center">
                <h1 class="text-4xl font-bold tracking-tight">Bem-vindo à Plataforma</h1>
                <p id="typing-text" class="mt-2 text-lg font-mono"></p>
            </div>
        </div>

        <!-- Lado Direito com Formulário -->
        <div class="w-full md:w-1/2 flex items-center justify-center p-8">
            <div class="w-full max-w-md space-y-8">
                <div class="text-center mb-6">
                    <img src="{{ asset('images/logo.png') }}" class="mx-auto h-16" alt="Logo">
                    <h2 class="text-2xl font-bold text-gray-800">Criar Conta</h2>
                </div>

                <!-- ... todo o restante do layout acima permanece igual ... -->

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <!-- Nome -->
                    <div>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" required
                            placeholder="Nome"
                            class="w-full border-b border-gray-300 focus:border-orange-500 bg-transparent py-2 text-sm focus:outline-none" />
                        <x-input-error :messages="$errors->get('name')" class="mt-1 text-red-500 text-xs" />
                    </div>

                    <!-- Email -->
                    <div>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required
                            placeholder="Email"
                            class="w-full border-b border-gray-300 focus:border-orange-500 bg-transparent py-2 text-sm focus:outline-none" />
                        <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-500 text-xs" />
                    </div>

                    <!-- Telefone -->
                    <div>
                        <input id="telefone" name="telefone" type="tel" value="{{ old('telefone') }}"
                            placeholder="Telefone"
                            class="w-full border-b border-gray-300 focus:border-orange-500 bg-transparent py-2 text-sm focus:outline-none" />
                        <x-input-error :messages="$errors->get('telefone')" class="mt-1 text-red-500 text-xs" />
                    </div>

                   <!-- Campo de Província com Autocomplete -->
<div x-data="autocomplete()" class="relative">
    <input
        x-model="query"
        @input="filterProvincias"
        @click.away="show = false"
        type="text"
        name="provincia"
        id="provincia"
        placeholder="Província"
        class="w-full border-b border-gray-300 focus:border-orange-500 bg-transparent py-2 text-sm focus:outline-none"
        autocomplete="off"
    />

    <!-- Lista de Sugestões -->
    <ul x-show="show" class="absolute z-10 bg-white w-full border rounded mt-1 max-h-60 overflow-y-auto text-sm shadow">
        <template x-for="(item, index) in filtered" :key="index">
            <li @click="selectProvincia(item)" class="cursor-pointer px-4 py-2 hover:bg-orange-100" x-text="item"></li>
        </template>
    </ul>
</div>

<x-input-error :messages="$errors->get('provincia')" class="mt-1 text-red-500 text-xs" />


                    <!-- Senha -->
                    <div>
                        <input id="password" name="password" type="password" required placeholder="Senha"
                            class="w-full border-b border-gray-300 focus:border-orange-500 bg-transparent py-2 text-sm focus:outline-none" />
                        <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-500 text-xs" />
                    </div>

                    <!-- Confirmação da Senha -->
                    <div>
                        <input id="password_confirmation" name="password_confirmation" type="password" required
                            placeholder="Confirme a Senha"
                            class="w-full border-b border-gray-300 focus:border-orange-500 bg-transparent py-2 text-sm focus:outline-none" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-red-500 text-xs" />
                    </div>

                    <!-- Termos de Uso -->
                    <div class="flex items-start gap-2 text-sm text-gray-600">
                        <input type="checkbox" id="termos" name="termos" required
                            class="mt-1 border-gray-300 focus:ring-orange-500 text-orange-600">
                        <label for="termos" class="leading-snug">
                            Eu li e aceito os
                            <a href="{{ route('termos') }}" class="text-orange-600 hover:underline" target="_blank">
                                Termos de Uso e Política de Privacidade
                            </a>.
                        </label>
                    </div>
                    <x-input-error :messages="$errors->get('termos')" class="mt-1 text-red-500 text-xs" />

                    <!-- Botões -->
                    <div class="flex justify-between items-center mt-4">
                        <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-orange-600">
                            Já tem uma conta?
                        </a>
                        <button type="submit"
                            class="bg-orange-600 hover:bg-orange-700 text-white px-5 py-2 rounded-md text-sm font-medium transition">
                            Registrar
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</body>

<script>
    function autocomplete() {
        return {
            query: '',
            show: false,
           provincias: [
        'Bengo', 'Benguela', 'Bié', 'Cabinda', 'Cuando', 'Cubango',
        'Cuanza Norte', 'Cuanza Sul', 'Cunene', 'Huambo', 'Huíla', 'Luanda',
        'Icolo e Bengo', 'Lunda Norte', 'Lunda Sul', 'Malanje', 'Moxico',
        'Moxico Leste', 'Namibe', 'Uíge', 'Zaire'
    ],
            filtered: [],
            filterProvincias() {
                const q = this.query.toLowerCase();
                this.filtered = this.provincias.filter(p => p.toLowerCase().includes(q));
                this.show = this.filtered.length > 0;
            },
            selectProvincia(item) {
                this.query = item;
                this.show = false;
            }
        }
    }
</script>


</html>
