<!DOCTYPE html>
<html lang="pt">

<head>
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
    <script src="https://unpkg.com/alpinejs" defer></script>

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
                            <li><a href="{{ route('admin.analises.create') }}"
                                    class="block py-2 px-4 hover:bg-blue-600 rounded">Criar</a></li>
                            <li><a href="{{ route('admin.analises.index') }}"
                                    class="block py-2 px-4 hover:bg-blue-600 rounded">Visualizar</a></li>
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
            <div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
                <h1 class="text-2xl font-bold text-gray-800 mb-6">Criar Novo Usuário</h1>

                @if (session('success'))
                    <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.usuarios.store') }}" class="space-y-5">
                    @csrf

                    <!-- Nome -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                            class="w-full border-b border-gray-300 focus:border-orange-500 bg-transparent py-2 text-sm focus:outline-none" />
                        <x-input-error :messages="$errors->get('name')" class="text-red-500 text-sm mt-1" />
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required
                            class="w-full border-b border-gray-300 focus:border-orange-500 bg-transparent py-2 text-sm focus:outline-none" />
                        <x-input-error :messages="$errors->get('email')" class="text-red-500 text-sm mt-1" />
                    </div>

                    <!-- Telefone -->
                    <div>
                        <label for="telefone" class="block text-sm font-medium text-gray-700">Telefone</label>
                        <input type="text" name="telefone" id="telefone" value="{{ old('telefone') }}"
                            class="w-full border-b border-gray-300 focus:border-orange-500 bg-transparent py-2 text-sm focus:outline-none" />
                        <x-input-error :messages="$errors->get('telefone')" class="text-red-500 text-sm mt-1" />
                    </div>

                    <!-- Província -->
                    <div>
                        <label for="provincia" class="block text-sm font-medium text-gray-700">Província</label>
                        <input type="text" name="provincia" id="provincia" value="{{ old('provincia') }}"
                            class="w-full border-b border-gray-300 focus:border-orange-500 bg-transparent py-2 text-sm focus:outline-none" />
                        <x-input-error :messages="$errors->get('provincia')" class="text-red-500 text-sm mt-1" />
                    </div>

                    <!-- Senha -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                        <input type="password" name="password" id="password" required
                            class="w-full border-b border-gray-300 focus:border-orange-500 bg-transparent py-2 text-sm focus:outline-none" />
                        <x-input-error :messages="$errors->get('password')" class="text-red-500 text-sm mt-1" />
                    </div>

                    <!-- Confirmação da Senha -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirme a
                            Senha</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required
                            class="w-full border-b border-gray-300 focus:border-orange-500 bg-transparent py-2 text-sm focus:outline-none" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="text-red-500 text-sm mt-1" />
                    </div>

                    <!-- Papel/Função -->
                    <div>
                        <label for="role" class="block text-sm font-medium text-gray-700">Função</label>
                        <select name="role" id="role"
                            class="w-full border-b border-gray-300 focus:border-orange-500 bg-transparent py-2 text-sm focus:outline-none">
                            <option value="user" {{ old('role') === 'user' ? 'selected' : '' }}>Usuário</option>
                            <option value="super-admin" {{ old('role') === 'super-admin' ? 'selected' : '' }}>Super
                                Admin</option>
                        </select>
                        <x-input-error :messages="$errors->get('role')" class="mt-1 text-red-500 text-xs" />
                    </div>

                    <!-- Botões -->
                    <div class="flex justify-end gap-4 mt-6">
                        <a href="{{ route('admin.usuarios.index') }}"
                            class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400 text-sm font-medium transition">
                            Cancelar
                        </a>
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-md text-sm font-medium transition">
                            Criar Usuário
                        </button>
                    </div>
                </form>
            </div>



        </div>
    </div>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>

</html>
