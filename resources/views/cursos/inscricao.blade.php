<!DOCTYPE html>

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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>


    <div class="bg-gray-100 min-h-screen flex items-center justify-center">
        <div class=" max-w-xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
            <h1 class="text-2xl font-semibold mb-4 text-center  text-gray-800">
                Inscrição no Curso: {{ $curso->nome }}
            </h1>


            <form action="{{ route('inscricao.curso.enviar', $curso->id) }}" method="POST" class="text-center">
                @csrf

                <p class="mb-6 text-gray-700">
                    Tem certeza que deseja se inscrever neste curso?
                </p>

                <div class="flex justify-center space-x-4">
                    <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition">
                        Confirmar Inscrição
                    </button>

                    <a href="{{ route('cursos.show', $curso->id) }}"
                        class="bg-gray-300 text-gray-800 px-6 py-2 rounded-md hover:bg-gray-400 transition">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>



</body>

</html>
