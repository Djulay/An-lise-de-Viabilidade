<!DOCTYPE html>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    
 
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                <!-- Usuários Cadastrados -->
                <div class="bg-blue-600 rounded-2xl p-6 text-white shadow-lg hover:shadow-xl transition">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center">
                            <i class="fas fa-users text-2xl"></i>
                        </div>
                        <div class="text-right">
                            <p class="text-sm uppercase tracking-wide text-white/70">Usuários</p>
                            <p class="text-3xl font-bold">{{ $usuariosCount }}</p>
                        </div>
                    </div>
                </div>

                <!-- Cursos Cadastrados -->
                <div class="bg-purple-600 rounded-2xl p-6 text-white shadow-lg hover:shadow-xl transition">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center">
                            <i class="fas fa-book text-2xl"></i>
                        </div>
                        <div class="text-right">
                            <p class="text-sm uppercase tracking-wide text-white/70">Cursos</p>
                            <p class="text-3xl font-bold">{{ $cursosCount }}</p>
                        </div>
                    </div>
                </div>

                <!-- Análises de Viabilidade -->
                <div class="bg-green-600 rounded-2xl p-6 text-white shadow-lg hover:shadow-xl transition">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center">
                            <i class="fas fa-chart-line text-2xl"></i>
                        </div>
                        <div class="text-right">
                            <p class="text-sm uppercase tracking-wide text-white/70">Análises</p>
                            <p class="text-3xl font-bold">{{ $analisesCount }}</p>
                        </div>
                    </div>
                </div>

                <!-- Inscrições -->
                <div class="bg-red-600 rounded-2xl p-6 text-white shadow-lg hover:shadow-xl transition">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center">
                            <i class="fas fa-user-graduate text-2xl"></i>
                        </div>
                        <div class="text-right">
                            <p class="text-sm uppercase tracking-wide text-white/70">Inscrições</p>
                            <p class="text-3xl font-bold">{{ $inscricoesCount }}</p>
                        </div>
                    </div>
                </div>

                <!-- Gender Distribution Chart -->
                <div class="bg-white rounded-2xl shadow-2xl p-8" data-aos="fade-right">
                    <div class="flex items-center mb-6">
                        <i class="fas fa-venus-mars text-2xl text-blue-600 mr-4"></i>
                        <h3 class="text-2xl font-bold text-gray-800">Distribuição por Gênero</h3>
                    </div>
                    <div class="relative h-80">
                        <canvas id="genderChart"></canvas>
                    </div>
                    <div class="mt-6 grid grid-cols-2 gap-4">
                        <div class="text-center p-4 bg-blue-50 rounded-lg">
                            <div class="text-2xl font-bold text-blue-600">1,547</div>
                            <div class="text-sm text-gray-600">Masculino (54.3%)</div>
                        </div>
                        <div class="text-center p-4 bg-pink-50 rounded-lg">
                            <div class="text-2xl font-bold text-pink-600">1,300</div>
                            <div class="text-sm text-gray-600">Feminino (45.7%)</div>
                        </div>
                    </div>
                </div>

                <!-- Viability Analysis Chart -->
                <div class="bg-white rounded-2xl shadow-2xl p-8" data-aos="fade-left">
                    <div class="flex items-center mb-6">
                        <i class="fas fa-chart-pie text-2xl text-green-600 mr-4"></i>
                        <h3 class="text-2xl font-bold text-gray-800">Análises de Viabilidade</h3>
                    </div>
                    <div class="relative h-80">
                        <canvas id="viabilityChart"></canvas>
                    </div>
                    <div class="mt-6 grid grid-cols-2 gap-4">
                        <div class="text-center p-4 bg-green-50 rounded-lg">
                            <div class="text-2xl font-bold text-green-600">61</div>
                            <div class="text-sm text-gray-600">Viáveis (68.5%)</div>
                        </div>
                        <div class="text-center p-4 bg-red-50 rounded-lg">
                            <div class="text-2xl font-bold text-red-600">28</div>
                            <div class="text-sm text-gray-600">Inviáveis (31.5%)</div>
                        </div>
                    </div>
                </div>


                 <!-- Top Courses Table -->
            <div class="lg:col-span-2 bg-white rounded-2xl shadow-2xl overflow-hidden" data-aos="fade-up">
                <div class="bg-gradient-to-r from-gray-800 to-gray-600 text-white p-6">
                    <div class="flex items-center">
                        <i class="fas fa-medal text-2xl mr-4"></i>
                        <h3 class="text-2xl font-bold">Top Cursos com Mais Inscrições</h3>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Curso</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Categoria</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Inscrições</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Popularidade</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4">
                                    <div>
                                        <div class="font-bold text-gray-900">JavaScript Avançado</div>
                                        <div class="text-sm text-gray-500">Programação</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex px-3 py-1 text-sm font-medium rounded-full bg-blue-100 text-blue-800">
                                        Tecnologia
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-lg font-bold text-green-600">347</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="progress-bar w-full h-2 rounded-full"></div>
                                    </div>
                                    <span class="text-sm text-gray-500 mt-1">100%</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4">
                                    <div>
                                        <div class="font-bold text-gray-900">Design UX/UI</div>
                                        <div class="text-sm text-gray-500">Design</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex px-3 py-1 text-sm font-medium rounded-full bg-purple-100 text-purple-800">
                                        Criatividade
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-lg font-bold text-green-600">289</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="progress-bar" style="width: 83%"></div>
                                    </div>
                                    <span class="text-sm text-gray-500 mt-1">83%</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4">
                                    <div>
                                        <div class="font-bold text-gray-900">Marketing Digital</div>
                                        <div class="text-sm text-gray-500">Marketing</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex px-3 py-1 text-sm font-medium rounded-full bg-green-100 text-green-800">
                                        Negócios
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-lg font-bold text-green-600">234</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="progress-bar" style="width: 67%"></div>
                                    </div>
                                    <span class="text-sm text-gray-500 mt-1">67%</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4">
                                    <div>
                                        <div class="font-bold text-gray-900">Python para Iniciantes</div>
                                        <div class="text-sm text-gray-500">Programação</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex px-3 py-1 text-sm font-medium rounded-full bg-blue-100 text-blue-800">
                                        Tecnologia
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-lg font-bold text-green-600">198</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="progress-bar" style="width: 57%"></div>
                                    </div>
                                    <span class="text-sm text-gray-500 mt-1">57%</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>

        
        </div>
    </div>

    <!-- Script dos Gráficos -->
    <script>
        const genderCtx = document.getElementById('genderChart').getContext('2d');
        new Chart(genderCtx, {
            type: 'doughnut',
            data: {
                labels: ['Masculino', 'Feminino'],
                datasets: [{
                    data: [1547, 1300],
                    backgroundColor: ['#3b82f6', '#ec4899'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        const viabilityCtx = document.getElementById('viabilityChart').getContext('2d');
        new Chart(viabilityCtx, {
            type: 'pie',
            data: {
                labels: ['Viável', 'Não Viável'],
                datasets: [{
                    data: [61, 28],
                    backgroundColor: ['#22c55e', '#ef4444'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>

    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>

</html>
