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
    <title>Quem Somos – Ideia Viável</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

</head>
<body class="bg-gray-100 text-gray-800">

    @include('menu')

  <section class="max-w-6xl mx-auto px-6 py-16 bg-white rounded-lg mt-8">
    <h1 class="text-4xl font-bold text-orange-600 mb-10 text-center">Quem Somos</h1>

    <div class="text-lg leading-relaxed text-gray-700 space-y-6">
        <p>
            A <strong>VTC – Viability Training and Consulting</strong> é uma empresa fundada por dois jovens angolanos visionários,
            sediada em Luanda, Angola. Nosso foco está na capacitação empreendedora, consultoria estratégica e uso de
            tecnologias inovadoras, especialmente com apoio de Inteligência Artificial.
        </p>

        <p>
            Somos os criadores da <strong>plataforma Ideia Viável</strong>, uma solução completa que permite analisar a viabilidade de
            ideias de negócio de forma simples, rápida e acessível. Utilizamos IA para prever o potencial de sucesso de uma ideia
            com base em dados reais e critérios bem definidos.
        </p>

        <p>
            Além da plataforma, a VTC oferece cursos online, mentorias personalizadas e consultorias para acelerar o sucesso
            de novos negócios, contribuindo ativamente para o fortalecimento do ecossistema empreendedor em Angola.
        </p>
    </div>

    <div class="mt-16 grid md:grid-cols-2 gap-12 items-start">
        <!-- Missão -->
        <div class="bg-gray-100 rounded-lg p-6 shadow hover:shadow-md transition">
            <h2 class="text-2xl font-semibold text-orange-500 mb-4">Nossa Missão</h2>
            <p class="text-base leading-relaxed text-gray-700">
                Democratizar o acesso a conhecimento, ferramentas e tecnologia para que qualquer pessoa em Angola e além
                possa transformar uma boa ideia em um negócio viável e sustentável.
            </p>
        </div>

        <!-- Visão -->
        <div class="bg-gray-100 rounded-lg p-6 shadow hover:shadow-md transition">
            <h2 class="text-2xl font-semibold text-orange-500 mb-4">Nossa Visão</h2>
            <p class="text-base leading-relaxed text-gray-700">
                Ser a principal referência em Angola no uso de tecnologia e inteligência artificial para apoiar o empreendedorismo,
                capacitando milhares de pessoas a empreender com mais confiança e impacto.
            </p>
        </div>

        <!-- Responsabilidade Social -->
        <div class="bg-gray-100 rounded-lg p-6 shadow hover:shadow-md transition md:col-span-2">
            <h2 class="text-2xl font-semibold text-orange-500 mb-4">Responsabilidade Social</h2>
            <p class="text-base leading-relaxed text-gray-700">
                Acreditamos que o empreendedorismo é uma ferramenta poderosa de transformação social. Por isso, realizamos
                formações gratuitas em comunidades, parcerias com escolas e ações educativas para jovens com potencial empreendedor.
                A VTC está comprometida com um futuro mais justo, tecnológico e inclusivo.
            </p>
        </div>
    </div>
</section>

    <section class="bg-gray-900 text-white py-16">
    <div class="max-w-5xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-orange-500 mb-12">Nossa Trajetória</h2>

        <div class="relative border-l border-orange-400">
            <!-- Marco 1 -->
            <div class="mb-10 ml-6">
                <div class="absolute w-4 h-4 bg-orange-500 rounded-full -left-2.5 border-2 border-white"></div>
                <time class="text-sm text-orange-300">2025</time>
                <h3 class="text-xl font-semibold mt-1">Fundação da VTC</h3>
                <p class="text-gray-300">
                    Dois jovens angolanos unem forças para criar a Viability Training and Consulting, com o propósito
                    de levar formação empreendedora e consultoria prática ao mercado angolano.
                </p>
            </div>

            <!-- Marco 2 -->
            <div class="mb-10 ml-6">
                <div class="absolute w-4 h-4 bg-orange-500 rounded-full -left-2.5 border-2 border-white"></div>
                <time class="text-sm text-orange-300">2025</time>
                <h3 class="text-xl font-semibold mt-1">Primeiros Workshops em Luanda</h3>
                <p class="text-gray-300">
                    Foram realizados os primeiros treinamentos presenciais em empreendedorismo e inovação, com jovens
                    em comunidades e universidades locais.
                </p>
            </div>

            <!-- Marco 3 -->
            <div class="mb-10 ml-6">
                <div class="absolute w-4 h-4 bg-orange-500 rounded-full -left-2.5 border-2 border-white"></div>
                <time class="text-sm text-orange-300">2025</time>
                <h3 class="text-xl font-semibold mt-1">Lançamento da Plataforma Ideia Viável</h3>
                <p class="text-gray-300">
                    É lançada a plataforma <strong>Ideia Viável</strong>, integrando inteligência artificial para prever
                    a viabilidade de negócios e auxiliar empreendedores a tomarem decisões baseadas em dados.
                </p>
            </div>

            <!-- Marco 4 -->
            <div class="mb-10 ml-6">
                <div class="absolute w-4 h-4 bg-orange-500 rounded-full -left-2.5 border-2 border-white"></div>
                <time class="text-sm text-orange-300">2025</time>
                <h3 class="text-xl font-semibold mt-1">Expansão e Novos Produtos</h3>
                <p class="text-gray-300">
                    A VTC expande seus serviços com cursos online, mentorias personalizadas e parcerias com incubadoras
                    de startups. A plataforma Ideia Viável passa a atender também pequenas e médias empresas.
                </p>
            </div>
        </div>
    </div>
</section>
<section class="bg-white py-16">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl md:text-4xl font-bold text-center text-orange-600 mb-12">Nossas Metas</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Meta 1 -->
            <div class="bg-gray-50 rounded-lg shadow p-6 hover:shadow-lg transition">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Alcançar 100.000 empreendedores</h3>
                <p class="text-gray-600">
                    Democratizar o acesso à análise de viabilidade e capacitação empreendedora em Angola e em toda a África Lusófona.
                </p>
            </div>

            <!-- Meta 2 -->
            <div class="bg-gray-50 rounded-lg shadow p-6 hover:shadow-lg transition">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Expandir para 8 províncias até 2027</h3>
                <p class="text-gray-600">
                    Levar treinamentos, consultoria e soluções tecnológicas com IA para empreendedores em várias províncias do país.
                </p>
            </div>

            <!-- Meta 3 -->
            <div class="bg-gray-50 rounded-lg shadow p-6 hover:shadow-lg transition">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Liderar inovação em IA para negócios</h3>
                <p class="text-gray-600">
                    Tornar-se referência nacional em soluções baseadas em inteligência artificial para validação, mentoria e aceleração de negócios.
                </p>
            </div>
        </div>

        <!-- Chamada final -->
        <div class="mt-16 text-center">
            <h4 class="text-2xl font-semibold text-gray-700 mb-4">Quer fazer parte dessa jornada?</h4>
            <a href="{{ route('contacto') }}"
               class="inline-block bg-orange-500 text-white py-3 px-6 rounded-lg hover:bg-orange-600 transition font-medium">
                Fale Connosco
            </a>
        </div>
    </div>
</section>


    @include('footer')

</body>
</html>
