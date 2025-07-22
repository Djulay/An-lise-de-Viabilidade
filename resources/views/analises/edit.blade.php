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
                <h1 class="text-3xl font-bold text-gray-800 mb-6">Editar Análise de Viabilidade de Negócio</h1>

                <div class="bg-blue-50 border-l-4 border-blue-500 text-blue-800 p-4 rounded-md mb-6">
                            <h2 class="font-semibold text-lg mb-2">Resultado da Previsão Anterior</h2>
                            <p>{{ $analise->resultado }}</p>
                        </div>

                <form action="{{ route('analises.update', $analise->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    @php
                        $inputClasses =
                            'w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500';
                        $labelClasses = 'block text-sm font-medium text-gray-700';
                    @endphp

                    <div>
                        <label class="{{ $labelClasses }}">Nome do Negócio</label>
                        <input type="text" name="nome_negocio" value="{{ $analise->nome_negocio }}" required
                            class="mt-1 p-2 border {{ $inputClasses }}">
                    </div>

                    <div>
                        <label class="{{ $labelClasses }}">Tipo de Negócio</label>
                        <select name="tipo_negocio" required class="mt-1 p-2 border {{ $inputClasses }}">
                            <option value="">Selecione uma opção</option>
                            @foreach (['Padaria', 'Criação de Galinhas', 'Lavandaria', 'Desenvolvimento de Software', 'Loja de Roupas', 'Oficina Mecânica', 'Venda de Peças', 'Restaurante', 'Transporte de Mototáxi', 'Agricultura', 'Fábrica de Cimento', 'Indústria de Madeira', 'Comércio de Água Mineral', 'Transportadora de Carga', 'Construção Civil', 'Mineração', 'Venda de Combustíveis', 'Farmácia', 'Hospedagem', 'Educação', 'Indústria de Bebidas Gaseificadas', 'Centro de Estética', 'Laticínios', 'Indústria de Vestuário', 'Energia Solar', 'Tecnologia da Informação', 'Reciclagem'] as $tipo)
                                <option value="{{ $tipo }}"
                                    {{ $analise->tipo_negocio == $tipo ? 'selected' : '' }}>{{ $tipo }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="{{ $labelClasses }}">Capital Inicial</label>
                            <input type="number" step="0.01" name="capital_inicial"
                                value="{{ $analise->capital_inicial }}" required
                                class="mt-1 p-2 border {{ $inputClasses }}">
                        </div>

                        <div>
                            <label class="{{ $labelClasses }}">Tempo de Retorno (meses)</label>
                            <select name="retorno" class="mt-1 p-2 border {{ $inputClasses }}">
                                @for ($i = 6; $i <= 36; $i++)
                                    <option value="{{ $i }}"
                                        {{ $analise->retorno == $i ? 'selected' : '' }}>{{ $i }} meses
                                    </option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="{{ $labelClasses }}">Província</label>
                            <select name="provincia" required class="mt-1 p-2 border {{ $inputClasses }}">
                                @foreach (['Luanda', 'Benguela', 'Huambo', 'Huíla', 'Uíge', 'Cuanza Sul', 'Zaire', 'Malanje', 'Lunda Norte', 'Lunda Sul', 'Cabinda', 'Namibe', 'Cuanza Norte', 'Moxico', 'Cuando Cubango', 'Bengo', 'Cunene'] as $prov)
                                    <option value="{{ $prov }}"
                                        {{ $analise->provincia == $prov ? 'selected' : '' }}>{{ $prov }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="{{ $labelClasses }}">Localização</label>
                            <select name="localizacao" required class="mt-1 p-2 border {{ $inputClasses }}">
                                <option value="Urbana" {{ $analise->localizacao == 'Urbana' ? 'selected' : '' }}>
                                    Urbana</option>
                                <option value="Suburbana"
                                    {{ $analise->localizacao == 'Suburbana' ? 'selected' : '' }}>Suburbana</option>
                                <option value="Rural" {{ $analise->localizacao == 'Rural' ? 'selected' : '' }}>Rural
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="{{ $labelClasses }}">Concorrência</label>
                            <select name="concorrencia" required class="mt-1 p-2 border {{ $inputClasses }}">
                                <option value="Alta" {{ $analise->concorrencia == 'Alta' ? 'selected' : '' }}>Alta
                                </option>
                                <option value="Média" {{ $analise->concorrencia == 'Média' ? 'selected' : '' }}>Média
                                </option>
                                <option value="Baixa" {{ $analise->concorrencia == 'Baixa' ? 'selected' : '' }}>Baixa
                                </option>
                            </select>
                        </div>

                        <div>
                            <label class="{{ $labelClasses }}">Demanda Local</label>
                            <select name="demanda_local" required class="mt-1 p-2 border {{ $inputClasses }}">
                                <option value="Alta" {{ $analise->demanda_local == 'Alta' ? 'selected' : '' }}>Alta
                                </option>
                                <option value="Média" {{ $analise->demanda_local == 'Média' ? 'selected' : '' }}>
                                    Média</option>
                                <option value="Baixa" {{ $analise->demanda_local == 'Baixa' ? 'selected' : '' }}>
                                    Baixa</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="{{ $labelClasses }}">Experiência</label>
                            <select name="experiencia" class="mt-1 p-2 border {{ $inputClasses }}">
                                <option value="Não" {{ $analise->experiencia == 'Não' ? 'selected' : '' }}>Não
                                </option>
                                <option value="Sim" {{ $analise->experiencia == 'Sim' ? 'selected' : '' }}>Sim
                                </option>
                            </select>
                        </div>

                        <div>
                            <label class="{{ $labelClasses }}">Fornecedores</label>
                            <select name="fornecedores" class="mt-1 p-2 border {{ $inputClasses }}">
                                <option value="Não" {{ $analise->fornecedores == 'Não' ? 'selected' : '' }}>Não
                                </option>
                                <option value="Sim" {{ $analise->fornecedores == 'Sim' ? 'selected' : '' }}>Sim
                                </option>
                            </select>
                        </div>

                        <div>
                            <label class="{{ $labelClasses }}">Apoio Governamental</label>
                            <select name="apoio" class="mt-1 p-2 border {{ $inputClasses }}">
                                <option value="Não" {{ $analise->apoio == 'Não' ? 'selected' : '' }}>Não</option>
                                <option value="Sim" {{ $analise->apoio == 'Sim' ? 'selected' : '' }}>Sim</option>
                            </select>
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit"
                            class="bg-blue-600 text-white px-5 py-2 rounded-md shadow hover:bg-blue-700 transition">
                            Atualizar Análise
                        </button>

                    </div>
                </form>
            </div>






        </div>
    </div>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>

</html>
