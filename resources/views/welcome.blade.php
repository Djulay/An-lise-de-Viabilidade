<!DOCTYPE html>

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FYMK5003LT"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-FYMK5003LT');
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/alpinejs" defer></script>
    <!-- PNG -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">



</head>

<body>

    @include('menu')

    <!-- ***** Slides ***** -->
    <div class="relative w-full h-screen overflow-hidden">
        <div id="slider" class="relative w-full h-full flex transition-transform duration-700 ease-in-out">
            <!-- Slide 1 -->
            <div class="w-full flex-shrink-0 h-full bg-cover bg-center flex items-center justify-center text-white"
                style="background-image: url('{{ asset('images/slide-01.jpg') }}');">
                <div class="text-center  p-8 ">
                    <h2 class="text-4xl font-bold">Transforme-se em um <span class="text-orange-500">Analista de
                            Projecto</span> em Apenas 3 Dias!</h2>
                    <p class="mt-4">Este curso abrange tudo, desde fórmulas básicas até automação com VBA.</p>
                    <div class="mt-6 flex justify-center space-x-4">
                        <a href="#about" class="bg-orange-600 px-6 py-2 rounded hover:bg-orange-700">Saber Mais</a>
                        <a href="#cursos" class="bg-green-600 px-6 py-2 rounded hover:bg-green-700">Inscreva-te</a>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="w-full flex-shrink-0 h-full bg-cover bg-center flex items-center justify-center text-white relative"
                style="background-image: url('{{ asset('images/slide-02.jpg') }}');">
                <div class="text-center max-w-3xl px-4">
                    <h2 class="text-4xl font-bold">
                        <span class="text-orange-500">Análise de Viabilidade</span> O Guia para o Sucesso do Seu Projeto
                    </h2>
                    <p class="mt-4">
                        Está pensando em tirar uma ideia do papel? Antes de investir tempo e dinheiro, é crucial saber
                        se o seu projeto tem chances reais de sucesso.
                    </p>

                    <!-- Countdown Timer -->
                    <div x-data="countdown('2025-08-01T00:00:00')"
                        class="mt-6 bg-black bg-opacity-30 rounded-lg p-4 inline-block">
                        <p class="text-lg font-semibold mb-2">Disponível em:</p>
                        <div class="text-orange-500 flex justify-center space-x-4 text-xl font-bold">
                            <div class="text-center">
                                <div x-text="days"></div>
                                <span class="text-sm">Dias</span>
                            </div>
                            <div class="text-center">
                                <div x-text="hours"></div>
                                <span class="text-sm">Horas</span>
                            </div>
                            <div class="text-center">
                                <div x-text="minutes"></div>
                                <span class="text-sm">Minutos</span>
                            </div>
                            <div class="text-center">
                                <div x-text="seconds"></div>
                                <span class="text-sm">Segundos</span>
                            </div>
                        </div>
                    </div>

                    <!-- Botões -->
                    <div class="mt-6 flex justify-center space-x-4">
                        <a href="#about" class="bg-orange-600 px-6 py-2 rounded hover:bg-orange-700">Saber Mais</a>
                        @if (auth()->check())
                            <a href="{{ route('analises.create') }}" id="shake-button"
                                class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">
                                Criar Viabilidade
                            </a>
                        @else
                            <a href="{{ route('login') }}?redirect_to={{ route('analises.create') }}" id="shake-button"
                                class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">
                                Criar Viabilidade
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="w-full flex-shrink-0 h-full bg-cover bg-center flex items-center justify-center text-white"
                style="background-image: url('{{ asset('images/slide-03.jpg') }}');">
                <div class="text-center">
                    <h2 class="text-4xl font-bold">Comece sua Jornada Hoje Mesmo!</h2>
                    <p class="mt-4">Aprimore suas habilidades e se destaque no mercado de trabalho.</p>
                    <div class="mt-6 flex justify-center space-x-4">
                        <a href="#about" class="bg-orange-600 px-6 py-2 rounded hover:bg-orange-700">Saber Mais</a>
                        <a href="#cursos" id="shake-button"
                            class="bg-green-600 px-6 py-2 rounded hover:bg-green-700 inline-block">Inscreva-te</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botões de navegação -->
        <button id="prev"
            class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-3 rounded-full">
            ❮
        </button>
        <button id="next"
            class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-3 rounded-full">
            ❯
        </button>

    </div>

    <!-- ***** Beneficios e resultados ***** -->
    <section class="  py-16 bg-gray-100" id="Benefícios">
        <div class="container mx-auto px-8">
            <div class="text-center mb-12">
                <h6 class="text-lg font-bold text-orange-600 ">Benefícios</h6>
                <h4 class="text-3xl font-bold text-gray-800">Resultados</h4>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div
                    class="service-card bg-white p-6 rounded-lg shadow-md flex items-start space-x-4 transition-transform duration-300">
                    <i class="fas fa-archive text-green-600 text-3xl"></i>
                    <div>
                        <h4 class="text-xl font-semibold text-gray-800">Identificação de Riscos e Oportunidades</h4>
                        <p class="text-gray-600">Permite antecipar problemas potenciais e descobrir oportunidades que
                            podem não ser óbvias inicialmente.</p>
                    </div>
                </div>
                <div
                    class="service-card bg-white  p-6 rounded-lg shadow-md flex items-start space-x-4 transition-transform duration-300">
                    <i class="fas fa-cloud text-green-600 text-3xl"></i>
                    <div>
                        <h4 class="text-xl font-semibold text-gray-800">Tomada de Decisão Informada</h4>
                        <p class="text-gray-600">Fornece dados concretos e análises detalhadas para ajudar a decidir se
                            vale a pena prosseguir com o projeto.</p>
                    </div>
                </div>
                <div
                    class="service-card bg-white p-6 rounded-lg shadow-md flex items-start space-x-4 transition-transform duration-300">
                    <i class="fas fa-charging-station text-green-600 text-3xl"></i>
                    <div>
                        <h4 class="text-xl font-semibold text-gray-800">Atração de Investidores</h4>
                        <p class="text-gray-600">Um estudo de viabilidade bem feito pode aumentar a confiança dos
                            investidores e facilitar a obtenção de financiamento.</p>
                    </div>
                </div>
                <div
                    class="service-card bg-white p-6 rounded-lg shadow-md flex items-start space-x-4 transition-transform duration-300">
                    <i class="fas fa-suitcase text-green-600 text-3xl"></i>
                    <div>
                        <h4 class="text-xl font-semibold text-gray-800">Otimização do Projeto</h4>
                        <p class="text-gray-600">Ajuda a refinar o plano do projeto, ajustando-o para maximizar o
                            retorno e minimizar os riscos.</p>
                    </div>
                </div>
                <div
                    class="service-card bg-white p-6 rounded-lg shadow-md flex items-start space-x-4 transition-transform duration-300">
                    <i class="fas fa-archway text-green-600 text-3xl"></i>
                    <div>
                        <h4 class="text-xl font-semibold text-gray-800">Alocação Eficiente de Recursos</h4>
                        <p class="text-gray-600">Garante que os recursos (tempo, dinheiro, pessoal) sejam alocados da
                            forma mais eficiente possível.</p>
                    </div>
                </div>
                <div
                    class="service-card bg-white p-6  rounded-lg shadow-md flex items-start space-x-4 transition-transform duration-300">
                    <i class="fas fa-puzzle-piece text-green-600 text-3xl"></i>
                    <div>
                        <h4 class="text-xl font-semibold text-gray-800">Redução de Perdas</h4>
                        <p class="text-gray-600">Evita o investimento em projetos que provavelmente falharão,
                            economizando tempo e dinheiro.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="my-10">
        <div class="w-full h-64 bg-cover bg-center flex items-center text-white"
            style="background-image: url('{{ asset('images/heading-bg.jpg') }}');">
            <div
                class="max-w-screen-xl mx-auto px-4 md:px-20 py-10 flex flex-col md:flex-row justify-between items-center w-full">
                <div class="font-bold text-2xl md:text-3xl text-center md:text-left mb-4 md:mb-0">
                    <h4>A <span class="text-orange-600">Solução</span> para a sua ideia de <br>
                        <span class="text-green-600">Negócio ou Empresa</span>
                    </h4>
                </div>
                <div>
                    <div class="flex items-center space-x-4">
                        <a href="#" class="bg-orange-600 px-6 py-2 rounded hover:bg-orange-700 text-center">Saber
                            Mais</a>
                        @if (auth()->check())
                            <a href="{{ route('analises.create') }}" id="shake-button"
                                class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">
                                Criar Viabilidade
                            </a>
                        @else
                            <a href="{{ route('login') }}?redirect_to={{ route('analises.create') }}" id="shake-button"
                                class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">
                                Criar Viabilidade
                            </a>
                        @endif

                    </div>


                </div>
            </div>
        </div>
    </section>

    <section id="cursos" class="my-16 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-10">
                <h6 class="text-lg font-bold text-orange-600">Cursos em Destaque</h6>
                <h4 class="text-3xl font-bold">O que você pode aprender</h4>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($cursosDestaque as $curso)
                        <div
                            class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-lg">
                            <img src="{{ $curso->imagem ? asset('storage/' . $curso->imagem) : 'https://via.placeholder.com/400x200' }}"
                                alt="{{ $curso->nome }}" class="w-full h-48 object-cover">
                            <div class="p-6 flex  items-start justify-between">
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $curso->nome }}</h3>
                                    <p class="text-sm text-gray-600 mb-1"><span class="font-medium">Duração:</span>
                                        {{ $curso->duracao ?? 'N/A' }}</p>
                                    <p class="text-sm text-gray-600 mb-1"><span class="font-medium">Requisito:</span>
                                        {{ $curso->requisito ?? 'N/A' }}</p>
                                    <p class="text-sm text-gray-600 mb-4"><span class="font-medium">Modalidade:</span>
                                        {{ $curso->modalidade }}</p>
                                </div>
                                <a href="{{ route('cursos.show', $curso->id) }}"
                                    class="inline-block bg-orange-500 text-white px-4 py-2 mt-16 rounded-md shadow-sm hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition duration-200">Saber
                                    Mais</a>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-500 col-span-full">Nenhum curso em destaque no momento.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </section>

    <!-- ======= formulario de inscrição ======= -->
    <section class="relative py-20 bg-gray-900" id="form">
        <div class="container mx-auto px-4 flex items-center justify-center">
            <div
                class="relative flex flex-col md:flex-row w-full md:w-4/5 lg:w-2/3 bg-gray-900 shadow-2xl rounded-2xl overflow-hidden">

                <!-- Imagem lateral -->
                <div class="relative w-full md:w-1/2 hidden md:flex items-center justify-center bg-gray-800">
                    <img src="{{ asset('images/calculator-image.png') }}" alt="Análise de Viabilidade"
                        class="w-[120%] h-auto transform -translate-x-8 md:-translate-x-10 drop-shadow-2xl">
                </div>

                <!-- Conteúdo de chamada -->
                <div class="w-full md:w-1/2 p-10 text-white flex flex-col justify-center">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-orange-500 mb-4">
                        Analise a Viabilidade da Sua Ideia de Negócio
                    </h2>
                    <p class="text-gray-300 mb-6 leading-relaxed">
                        Não invista no escuro! Deixe a nossa inteligência artificial ajudá-lo a descobrir se sua ideia
                        tem futuro.
                        Faça uma análise gratuita e receba dicas práticas para melhorar seu plano.
                    </p>
                    <a href="{{ route('analises.create') }}"
                        class="inline-block bg-orange-500 hover:bg-orange-600 text-white text-center font-bold py-3 px-6 rounded-xl shadow-lg transition duration-300">
                        Iniciar Análise Agora
                    </a>
                </div>

            </div>
        </div>
    </section>

    <section id="cursos" class="my-16 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-10">
                <h6 class="text-lg font-bold text-orange-600">Nosso serviços</h6>
                <h4 class="text-3xl font-bold">Prestamos serviços nas seguintes areas</h4>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

                <div class="max-w-3xl mx-auto p-4 space-y-4" x-data="{ open: null }">
                    <!-- Tema 1 -->
                    <div @click="open === 1 ? open = null : open = 1" class="cursor-pointer border p-4 rounded shadow">
                        <p class="font-semibold text-lg flex justify-between items-center">
                            Formação e Treinamento
                            <span class="text-orange-600 font-bold text-xl">+</span>
                        </p>
                        <div x-show="open === 1" x-transition class="mt-2 text-gray-700">
                            Capacitações presenciais e online voltadas para inovação, tecnologia, liderança, gestão de
                            negócios e ferramentas digitais. Ajudamos profissionais e empresas a se adaptarem às
                            exigências do mercado moderno com conteúdos práticos, atualizados e aplicáveis ao contexto
                            africano.
                        </div>
                    </div>

                    <!-- Tema 2 -->
                    <div @click="open === 2 ? open = null : open = 2" class="cursor-pointer border p-4 rounded shadow">
                        <p class="font-semibold text-lg flex justify-between items-center">
                            Consultoria Estratégica
                            <span class="text-orange-600 font-bold text-xl">+</span>
                        </p>
                        <div x-show="open === 2" x-transition class="mt-2 text-gray-700">
                            Atuamos lado a lado com empresas e empreendedores para diagnosticar desafios, propor
                            soluções e desenhar estratégias sob medida. Nossas consultorias abrangem gestão, marketing,
                            operações, finanças e transformação digital com foco em resultados reais.
                        </div>
                    </div>

                    <!-- Tema 3 -->
                    <div @click="open === 3 ? open = null : open = 3" class="cursor-pointer border p-4 rounded shadow">
                        <p class="font-semibold text-lg flex justify-between items-center">
                            Desenvolvimento de Softwares e Aplicativos
                            <span class="text-orange-600 font-bold text-xl">+</span>
                        </p>
                        <div x-show="open === 3" x-transition class="mt-2 text-gray-700">
                            Criamos soluções digitais personalizadas para atender às necessidades de cada negócio: desde
                            websites institucionais até aplicativos móveis e sistemas completos. Usamos tecnologias
                            modernas, com foco em segurança, escalabilidade e experiência do usuário.
                        </div>
                    </div>

                    <!-- Tema 4 -->
                    <div @click="open === 4 ? open = null : open = 4" class="cursor-pointer border p-4 rounded shadow">
                        <p class="font-semibold text-lg flex justify-between items-center">
                            Elaboração de Estudos de Viabilidade
                            <span class="text-orange-600 font-bold text-xl">+</span>
                        </p>
                        <div x-show="open === 4" x-transition class="mt-2 text-gray-700">
                            Analisamos ideias de negócio e projetos para determinar seu potencial de sucesso. Avaliamos
                            fatores técnicos, financeiros, de mercado e legais para oferecer relatórios claros e
                            confiáveis que orientam a tomada de decisão dos nossos clientes.
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </section>



    <!-- ======= Testemunho ======= -->
    <section id="testimonials" class="py-12 bg-gray-100">
        <div class="container mx-auto px-4">
            <!-- Título -->
            <div class="text-center mb-8">
                <h6 class="text-orange-500 font-bold text-lg">Testemunho</h6>
                <h4 class="text-3xl font-bold text-gray-800">O que nossos alunos dizem</h4>
            </div>

            <!-- Slider -->
            <div class="relative w-full max-w-4xl mx-auto">
                <div class="swiper testimonials-slider">
                    <div class="swiper-wrapper">
                        <!-- Testemunho 1 -->
                        <div
                            class="swiper-slide bg-white p-6 rounded-lg shadow-lg flex flex-col items-center text-center">
                            <i class="fa fa-quote-left text-orange-500 text-3xl mb-4"></i>
                            <p class="text-gray-700 italic">“Donec et nunc massa. Nullam non felis dignissim, dapibus
                                turpis semper, vulputate lorem. Nam volutpat posuere tellus.”</p>
                            <h4 class="text-lg font-semibold mt-4 text-gray-900">David Eigenberg</h4>
                            <span class="text-sm text-gray-500">CEO of Mexant</span>
                            <div class="w-16 h-16 mt-4 rounded-full overflow-hidden border-2 border-orange-500">
                                <img src="{{ asset('images/testimonials-01.jpg') }}" alt="David Eigenberg"
                                    class="w-full h-full object-cover">
                            </div>
                        </div>

                        <!-- Testemunho 2 -->
                        <div
                            class="swiper-slide bg-white p-6 rounded-lg shadow-lg flex flex-col items-center text-center">
                            <i class="fa fa-quote-left text-orange-500 text-3xl mb-4"></i>
                            <p class="text-gray-700 italic">“Etiam id ligula risus. Fusce fringilla nisl nunc, nec
                                rutrum lectus cursus nec. In blandit nibh dolor, at rutrum leo accumsan porta.”</p>
                            <h4 class="text-lg font-semibold mt-4 text-gray-900">Andrew Garfield</h4>
                            <span class="text-sm text-gray-500">CTO of Mexant</span>
                            <div class="w-16 h-16 mt-4 rounded-full overflow-hidden border-2 border-orange-500">
                                <img src="{{ asset('images/testimonials-01.jpg') }}" alt="Andrew Garfield"
                                    class="w-full h-full object-cover">
                            </div>
                        </div>

                        <!-- Testemunho 3 -->
                        <div
                            class="swiper-slide bg-white p-6 rounded-lg shadow-lg flex flex-col items-center text-center">
                            <i class="fa fa-quote-left text-orange-500 text-3xl mb-4"></i>
                            <p class="text-gray-700 italic">“Ut dictum vehicula massa, ac pharetra leo tincidunt eu.
                                Phasellus in tristique magna, ac gravida leo. Integer sed lorem sapien.”</p>
                            <h4 class="text-lg font-semibold mt-4 text-gray-900">George Lopez</h4>
                            <span class="text-sm text-gray-500">Crypto Manager</span>
                            <div class="w-16 h-16 mt-4 rounded-full overflow-hidden border-2 border-orange-500">
                                <img src="{{ asset('images/testimonials-01.jpg') }}" alt="George Lopez"
                                    class="w-full h-full object-cover">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botões de Navegação -->
                <div class="flex justify-center mt-6 space-x-4">
                    <button class="swiper-button-prev p-2 bg-gray-300 rounded-full hover:bg-gray-400">
                        <i class="fa fa-chevron-left"></i>
                    </button>
                    <button class="swiper-button-next p-2 bg-gray-300 rounded-full hover:bg-gray-400">
                        <i class="fa fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="partners py-12 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-8">
                <h6 class="text-orange-500 font-bold text-lg">Parceiros</h6>
                <h4 class="text-3xl font-bold text-gray-800">Seja nosso parceiro assim como</h4>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-6 justify-center items-center">
                <div class="flex justify-center">
                    <img src="{{ asset('images/client-01.png') }}" alt="Cliente 1" class="w-24 h-auto">
                </div>
                <div class="flex justify-center">
                    <img src="{{ asset('images/client-01.png') }}" alt="Cliente 2" class="w-24 h-auto">
                </div>
                <div class="flex justify-center">
                    <img src="{{ asset('images/client-01.png') }}" alt="Cliente 3" class="w-24 h-auto">
                </div>
                <div class="flex justify-center">
                    <img src="{{ asset('images/client-01.png') }}" alt="Cliente 4" class="w-24 h-auto">
                </div>
                <div class="flex justify-center">
                    <img src="{{ asset('images/client-01.png') }}" alt="Cliente 5" class="w-24 h-auto">
                </div>
                <div class="flex justify-center">
                    <img src="{{ asset('images/client-01.png') }}" alt="Cliente 6" class="w-24 h-auto">
                </div>
            </div>
        </div>
    </section>



    <!-- ======= Footer ======= -->
    @include('footer')
</body>

<!-- Script do Countdown com Alpine.js -->
<script>
    function countdown(targetDateStr) {
        return {
            days: '00',
            hours: '00',
            minutes: '00',
            seconds: '00',
            interval: null,
            init() {
                const target = new Date(targetDateStr).getTime();
                this.interval = setInterval(() => {
                    const now = new Date().getTime();
                    const distance = target - now;

                    if (distance <= 0) {
                        clearInterval(this.interval);
                        this.days = this.hours = this.minutes = this.seconds = '00';
                        return;
                    }

                    this.days = String(Math.floor(distance / (1000 * 60 * 60 * 24))).padStart(2, '0');
                    this.hours = String(Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))).padStart(2, '0');
                    this.minutes = String(Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))).padStart(2, '0');
                    this.seconds = String(Math.floor((distance % (1000 * 60)) / 1000)).padStart(2, '0');
                }, 1000);
            }
        }
    }
</script>

</html>