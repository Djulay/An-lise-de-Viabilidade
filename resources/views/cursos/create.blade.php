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
@extends('layouts.app')

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
            <h2 class="text-2xl font-bold mb-6">Painel Admin</h2>
            <nav>
                <ul>
                    <li class="mb-4"><a href="{{ route('dashboard') }}"
                            class="block py-2 px-4 hover:bg-blue-700 rounded">Dashboard</a></li>
                    <li class="mb-4">
                        <button data-toggle="usersMenu"
                            class="block w-full text-left py-2 px-4 hover:bg-blue-700 rounded">Usuários</button>
                        <ul id="usersMenu" class="hidden ml-4">
                           <li><a href="{{ route('admin.usuarios.create') }}"
                                    class="block py-2 px-4 hover:bg-blue-600 rounded">Criar</a></li>
                            <li><a href="{{ route('admin.usuarios.index') }}"
                                    class="block py-2 px-4 hover:bg-blue-600 rounded">Visualizar</a></li>
                        </ul>
                    </li>

                    <li class="mb-4">
                        <button data-toggle="coursesMenu"
                            class="block w-full text-left py-2 px-4 hover:bg-blue-700 rounded">Formações</button>
                        <ul id="coursesMenu" class="hidden ml-4">
                            <li><a href="{{ route('admin.cursos.create') }}"
                                    class="block py-2 px-4 hover:bg-blue-600 rounded">Criar</a></li>
                            <li><a href="{{ route('admin.cursos.index') }}"
                                    class="block py-2 px-4 hover:bg-blue-600 rounded">Visualizar</a></li>
                            <li><a href="{{ route('admin.inscricoes') }}"
                                    class="block py-2 px-4 hover:bg-blue-600 rounded">Matriculas</a></li>

                        </ul>
                    </li>

                    <li class="mb-4">
                        <button data-toggle="viabilityMenu"
                            class="block w-full text-left py-2 px-4 hover:bg-blue-700 rounded">Análise de
                            Viabilidade</button>
                        <ul id="viabilityMenu" class="hidden ml-4">
                           <li><a href="{{ route("analises.create") }}" class="block py-2 px-4 hover:bg-blue-600 rounded">Criar</a></li>
                            <li><a href="#" class="block py-2 px-4 hover:bg-blue-600 rounded">Visualizar</a></li>
                        </ul>
                    </li>

                    <li class="mb-4"><a href="#"
                            class="block py-2 px-4 hover:bg-blue-700 rounded">Configurações</a></li>
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
                    <div class="relative ">
                        <div class="flex text-center flex-col items-center cursor-pointer" onclick="toggleDropdown()">
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
            <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
                <h1 class="text-2xl font-bold text-gray-800 mb-6">Criar Novo Curso</h1>
                <form action="{{ route('admin.cursos.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-4">
                    @csrf

                    <!-- Campo Imagem -->
                    <div>
                        <label for="imagem" class="block text-sm font-medium text-gray-700">Imagem do Curso</label>
                        <input type="file" name="imagem" id="imagem"
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        @error('imagem')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo Nome -->
                    <div>
                        <label for="nome" class="block text-sm font-medium text-gray-700">Nome do Curso</label>
                        <input type="text" name="nome" id="nome" value="{{ old('nome') }}"
                            placeholder="Nome do Curso"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @error('nome')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo Duração -->
                    <div>
                        <label for="duracao" class="block text-sm font-medium text-gray-700">Duração</label>
                        <input type="text" name="duracao" id="duracao" value="{{ old('duracao') }}"
                            placeholder="Ex: 6 meses"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @error('duracao')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo Custo -->
                    <div>
                        <label for="custo" class="block text-sm font-medium text-gray-700">Custo (KZ)</label>
                        <input type="number" name="custo" id="custo" value="{{ old('custo') }}"
                            placeholder="Ex: 50000" step="0.01"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @error('custo')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo Requisito -->
                    <div>
                        <label for="requisito" class="block text-sm font-medium text-gray-700">Requisito</label>
                        <input type="text" name="requisito" id="requisito" value="{{ old('requisito') }}"
                            placeholder="Ex: Ensino médio completo"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @error('requisito')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo Modalidade -->
                    <div>
                        <label for="modalidade" class="block text-sm font-medium text-gray-700">Modalidade</label>
                        <select name="modalidade" id="modalidade"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="Presencial" {{ old('modalidade') === 'Presencial' ? 'selected' : '' }}>
                                Presencial</option>
                            <option value="Hibrida" {{ old('modalidade') === 'Hibrida' ? 'selected' : '' }}>Híbrida
                            </option>
                            <option value="Online" {{ old('modalidade') === 'Online' ? 'selected' : '' }}>Online
                            </option>
                        </select>
                        @error('modalidade')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo Local -->
                    <div>
                        <label for="local" class="block text-sm font-medium text-gray-700">Local</label>
                        <input type="text" name="local" id="local" value="{{ old('local') }}"
                            placeholder="Ex: Luanda"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @error('local')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo Ofertas -->
                    <div>
                        <label for="ofertas" class="block text-sm font-medium text-gray-700">Ofertas</label>
                        <input type="text" name="ofertas" id="ofertas" value="{{ old('ofertas') }}"
                            placeholder="Ex: Certificado incluso"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @error('ofertas')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo Descrição -->
                    <div>
                        <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição</label>
                        <textarea name="descricao" id="descricao" rows="4" placeholder="Descrição do curso"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ old('descricao') }}</textarea>
                        @error('descricao')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo Destaque -->
                    <div class="mb-4">
                        <label for="slug" class="block text-sm font-medium text-gray-700">Destaque:</label>
                        <select name="slug" id="slug"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                            <option value="não destacar">Não destacar
                            </option>
                            <option value="destacar">Destacar</option>
                        </select>
                    </div>

                    <!-- Botão de Submit -->
                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-blue-600 text-white px-6 py-2 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Cadastrar
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>

</html>
