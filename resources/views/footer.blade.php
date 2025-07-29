<footer class="bg-gray-900 text-white py-12 px-6">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-10">
        <!-- Sobre -->
        <div>
            <h4 class="text-xl font-semibold mb-4 text-orange-500">Ideia Viável</h4>
            <p class="text-sm text-gray-400">Plataforma de cursos, consultoria e análise de ideias de negócio com IA. Transformamos sua ideia em realidade.</p>
        </div>

        <!-- Menu Rápido -->
        <div>
            <h4 class="text-lg font-semibold mb-4 text-orange-500">Navegação</h4>
            <ul class="space-y-2 text-sm">
                <li><a href="{{ route('home') }}" class="hover:text-orange-400">Início</a></li>
                <li><a href="{{ route('home') }}#Benefícios" class="hover:text-orange-400">Benefícios</a></li>
                <li><a href="{{ route('home') }}#cursos" class="hover:text-orange-400">Cursos</a></li>
                <li><a href="{{ route('home') }}#testimonials" class="hover:text-orange-400">Testemunho</a></li>
                <li><a href="{{ route('quem_somos') }}#form" class="hover:text-orange-400">Sobre Nós</a></li>
                <li><a href="{{ route('contacto') }}" class="hover:text-orange-400">Contato</a></li>
            </ul>
        </div>

        <!-- Newsletter -->
        <div>
            <h4 class="text-lg font-semibold mb-4 text-orange-500">Receba Novidades</h4>
            <p class="text-sm text-gray-400 mb-3">Cadastre-se e receba atualizações sobre novos cursos, dicas e muito mais.</p>
            @if(session('success'))
    <p class="text-green-400 text-sm mb-2">{{ session('success') }}</p>
@endif

<form action="{{ route('newsletter.store') }}" method="POST" class="flex flex-col space-y-3">
    @csrf
    <input type="email" name="email" placeholder="Seu e-mail"
        class="px-3 py-2 rounded-md bg-gray-800 text-white placeholder-gray-400 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-orange-500"
        required>
    @error('email')
        <p class="text-red-400 text-sm">{{ $message }}</p>
    @enderror
    <button type="submit"
        class="bg-orange-500 hover:bg-orange-600 text-white py-2 px-4 rounded-md font-semibold transition">
        Inscrever-se
    </button>
</form>

        </div>

        <!-- Contacto -->
        <div>
            <h4 class="text-lg font-semibold mb-4 text-orange-500">Contacto</h4>
            <ul class="text-sm text-gray-400 space-y-2">
                <li>Email: suporte@ideiaviavel.ao</li>
                <a href="https://wa.me/945693281" target="_blank">WhatsApp: +244 945 693 281</a>
                <li>Luanda - Angola</li>
            </ul>
        </div>
    </div>

    <div class="mt-10 text-center text-gray-500 text-xs border-t border-gray-800 pt-4">
        <p>© {{ date('Y') }} Ideia Viável. Todos os direitos reservados. Desenvolvido por <a href="https://wa.me/945693281" target="_blank" class="text-orange-500 hover:underline">Júlio César</a>.</p>
    </div>
</footer>
