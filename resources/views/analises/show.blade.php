<!DOCTYPE html>
<html lang="pt">

<head>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-FYMK5003LT"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-FYMK5003LT');
</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function toggleDropdown() {
            document.getElementById('userDropdown').classList.toggle('hidden');
        }

        function toggleSidebar() {
            let sidebar = document.getElementById('sidebar');
            let overlay = document.getElementById('overlay');
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }
    </script>
</head>

<body class="bg-gray-100">
    <!-- Overlay -->
    <div id="overlay" class="absolute inset-0 bg-black bg-opacity-50 hidden md:hidden" onclick="toggleSidebar()"></div>

    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside id="sidebar"
            class="w-64 bg-blue-900 text-white p-5 fixed inset-y-0 left-0 transform -translate-x-full md:translate-x-0 transition-transform duration-300 z-50">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" class="h-10 mb-6" alt="">
            </a>
            <h2 class="text-2xl font-bold mb-6">Painel</h2>
            <nav>
                <ul>
                    <li class="mb-4"><a href="{{ route('dashboard') }}"
                            class="block py-2 px-4 hover:bg-blue-700 rounded">Dashboard</a></li>


                    <li class="mb-4">
                        <button data-toggle="coursesMenu"
                            class="block w-full text-left py-2 px-4 hover:bg-blue-700 rounded">Formações</button>
                        <ul id="coursesMenu" class="hidden ml-4">
                            <li><a href="{{ route('user.cursos') }}"
                                    class="block py-2 px-4 hover:bg-blue-600 rounded">Visualizar</a></li>
                        </ul>
                    </li>

                    <li class="mb-4">
                        <button data-toggle="viabilityMenu"
                            class="block w-full text-left py-2 px-4 hover:bg-blue-700 rounded">Análise de
                            Viabilidade</button>
                        <ul id="viabilityMenu" class="hidden ml-4">
                            <li><a href="{{ route('analises.create') }}"
                                    class="block py-2 px-4 hover:bg-blue-600 rounded">Criar</a></li>
                            <li><a href="{{ route('analises.index') }}"
                                    class="block py-2 px-4 hover:bg-blue-600 rounded">Visualizar</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main content -->
        <div class="flex-1 p-6 md:ml-64">
            <!-- Navbar -->
            <header class="flex justify-between items-center bg-white p-4 shadow-md rounded-lg mb-6 relative z-20">
                <div class="flex items-center space-x-4">
                    <button class="md:hidden text-gray-700 text-2xl" onclick="toggleSidebar()">☰</button>
                    <div class="relative w-full max-w-lg">
                        <input type="text" placeholder="Pesquisar..."
                            class="w-full pl-4 pr-10 py-2 bg-gray-200 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button
                            class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-600 hover:text-gray-800">
                            🔍
                        </button>
                    </div>
                </div>

                <div class="flex items-center space-x-6">
                    <!-- Ícone de Notificação -->
                    <button class="relative text-gray-700 hover:text-gray-900">
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full px-1">3</span>
                        🔔
                    </button>

                    <!-- Perfil do Usuário -->
                    <div class="relative text-center">
                        <div class="flex flex-col items-center cursor-pointer" onclick="toggleDropdown()">
                            <img src="{{ asset('images/testimonials-01.jpg') }}" alt="Foto do usuário"
                                class="w-12 h-12 rounded-full border-2 border-gray-300 shadow-sm">
                            <span class="font-semibold mt-1">{{ Auth::user()->name }}</span>
                        </div>

                        <!-- Dropdown Menu -->
                        <div id="userDropdown"
                            class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg hidden z-50">
                            <ul class="py-2">
                                <li><a href="{{ route('profile.edit') }}"
                                        class="block px-4 py-2 hover:bg-gray-200">Editar Perfil</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">Meus Contatos</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-200">Configurações de
                                        Conta</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit"
                                            class="block w-full text-left bg-orange-600 px-4 py-2 hover:bg-orange-700 ">Sair</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>


            <!-- Dashboard content -->
            <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md mt-10">
                <div class="p-6 bg-white rounded-xl shadow-md">
                    <h1 class="text-2xl font-bold text-gray-800 mb-6">Resultado da Análise</h1>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-3 mb-6 text-sm text-gray-700">
                        <p><strong class="font-medium">Nome da Ideia:</strong> {{ $analise->nome_negocio }}</p>
                        <p><strong class="font-medium">Tipo de Negócio:</strong> {{ $analise->tipo_negocio }}</p>
                        <p><strong class="font-medium">Capital Inicial:</strong> AKZ
                            {{ number_format($analise->capital_inicial, 2, ',', '.') }}</p>
                        <p><strong class="font-medium">Província:</strong> {{ $analise->provincia }}</p>
                        <p><strong class="font-medium">Localização:</strong> {{ $analise->localizacao }}</p>
                        <p><strong class="font-medium">Concorrência:</strong> {{ $analise->concorrencia }}</p>
                        <p><strong class="font-medium">Demanda Local:</strong> {{ $analise->demanda_local }}</p>
                        <p><strong class="font-medium">Experiência:</strong> {{ $analise->experiencia }}</p>
                        <p><strong class="font-medium">Fornecedores:</strong> {{ $analise->fornecedores }}</p>
                        <p><strong class="font-medium">Apoio:</strong> {{ $analise->apoio }}</p>
                        <p><strong class="font-medium">Tempo de Retorno:</strong> {{ $analise->retorno }} meses</p>
                    </div>

                    <div class="bg-blue-50 border-l-4 border-blue-500 text-blue-800 p-4 rounded-md mb-6">
                        <h2 class="font-semibold text-lg mb-2">Resultado da Previsão</h2>
                        <p>{{ $analise->resultado }}</p>
                    </div>

                    @if ($sugestoes && count($sugestoes))
                        <div class="mb-6">
                            <h2 class="text-lg font-semibold mb-2">Sugestões de Melhoria</h2>
                            <ul class="list-disc list-inside text-sm text-gray-700">
                                @foreach ($sugestoes as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <p class="text-sm text-gray-600 mb-6">Nenhuma sugestão registrada.</p>
                    @endif

                    <div class="flex flex-col sm:flex-row gap-3 mt-6">
                        <a href="{{ route('analises.create') }}"
                            class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition text-sm font-medium text-center">
                            Nova Análise
                        </a>
                        <a href="{{ route('analises.edit', $analise->id) }}"
                            class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 transition text-sm font-medium text-center">
                            Editar
                        </a>
                        <a href="{{ route('analises.pdf', $analise->id) }}"
                            class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition text-sm font-medium text-center">
                            Baixar PDF
                        </a>

                    </div>
                </div>
            </div>



        </div>
    </div>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>

</html>
