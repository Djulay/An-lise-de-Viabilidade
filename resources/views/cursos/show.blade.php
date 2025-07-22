@include('menu')




<div class="max-w-6xl mx-auto bg-white p-8 rounded-lg shadow-md my-44">
    {{-- Cabeçalho --}}
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 text-center">
            {{ session('success') }}
        </div>
    @endif

    @if (session('warning'))
        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-6 text-center">
            {{ session('warning') }}
        </div>
    @endif

    {{-- Título e Imagem --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $curso->nome }}</h1>
        @if ($curso->imagem)
            <img src="{{ asset('storage/' . $curso->imagem) }}" alt="{{ $curso->nome }}"
                class="w-full h-80 object-cover rounded-lg shadow-sm">
        @else
            <div class="w-full h-80 bg-gray-200 rounded-lg flex items-center justify-center text-gray-500">
                <span>Sem imagem</span>
            </div>
        @endif
    </div>

    {{-- Grade em Duas Colunas --}}
    <div class="flex flex-col md:flex-row gap-8">
        {{-- Coluna Esquerda: Detalhes do Curso --}}
        <div class="md:w-1/3 space-y-6">

            {{-- Blocos de informação --}}
            @php
                $infos = [
                    ['title' => 'Duração', 'value' => $curso->duracao ?? 'N/A'],
                    ['title' => 'Custo', 'value' => $curso->custo ? number_format($curso->custo, 2, ',', '.') . ' KZ' : 'N/A'],
                    ['title' => 'Requisito', 'value' => $curso->requisito ?? 'N/A'],
                    ['title' => 'Modalidade', 'value' => $curso->modalidade],
                    ['title' => 'Local', 'value' => $curso->local ?? 'N/A'],
                    ['title' => 'Ofertas', 'value' => $curso->ofertas ?? 'N/A'],
                    ['title' => 'Inscritos', 'value' => $curso->inscritos],
                ];
            @endphp

            @foreach ($infos as $info)
                <div>
                    <h2 class="text-lg font-semibold text-gray-700">{{ $info['title'] }}</h2>
                    <p class="text-gray-600">{{ $info['value'] }}</p>
                </div>
            @endforeach
        </div>

        {{-- Coluna Direita: Descrição --}}
        <div class="md:w-2/3">
            <div>
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Descrição do Curso</h2>
                <p class="text-gray-700 leading-relaxed">{{ $curso->descricao ?? 'N/A' }}</p>
            </div>
        </div>
    </div>

    {{-- Área de Ação --}}
    <div class="mt-12 text-center space-y-4">
        @guest
            <p class="text-gray-700 font-medium">
                Para te inscreveres neste curso, é necessário fazer login. Se ainda não tem uma conta, crie uma gratuitamente.
            </p>

            <div class="flex flex-col items-center space-y-4">
                <a href="{{ route('login') }}"
                    onclick="event.preventDefault(); document.getElementById('redirect-login-form').submit();"
                    class="w-64 bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
                    Já tenho conta!
                </a>
                <form id="redirect-login-form" action="{{ route('login') }}" method="GET" class="hidden">
                    <input type="hidden" name="redirect_to" value="{{ route('inscricao.curso', ['id' => $curso->id]) }}">
                </form>

                <a href="{{ route('register') }}"
                    onclick="event.preventDefault(); document.getElementById('redirect-register-form').submit();"
                    class="w-64 bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
                    Ainda não tenho conta!
                </a>
                <form id="redirect-register-form" action="{{ route('register') }}" method="GET" class="hidden">
                    <input type="hidden" name="redirect_to" value="{{ route('inscricao.curso', ['id' => $curso->id]) }}">
                </form>
            </div>
        @endguest

        @auth
            <a href="{{ route('inscricao.curso', ['id' => $curso->id]) }}"
                class="block w-64 mx-auto text-center bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition">
                Quero me inscrever
            </a>
        @endauth

        <a href="https://wa.me/+244945693281?text=Quero%20saber%20mais%20sobre%20o%20curso%20{{ urlencode($curso->nome) }}"
            target="_blank"
            class="block w-64 mx-auto bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition">
            Fale pelo WhatsApp
        </a>
    </div>
</div>



@include('footer')