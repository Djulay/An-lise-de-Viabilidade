
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
    <title>Contacto – Ideia Viável</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">


</head>
<body class="bg-gray-100 text-gray-800">

    @include('menu')



<div class="bg-black text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-orange-500 mb-6 mt-20">Entre em Contacto</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Mapa + redes sociais -->
            <div class="space-y-6">
                <!-- Mapa -->
                <div class="rounded overflow-hidden shadow-lg">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1575.965308644629!2d13.240164116328672!3d-8.83833301339079!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1a5203f2df6b58fd%3A0xaaaaabbbbb123456!2sLuanda%2C%20Angola!5e0!3m2!1spt-PT!2sao!4v1700000000000"
                        width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>

                <!-- Redes Sociais -->
                <div class="space-y-2">
                    <p class="text-lg font-semibold">Siga-nos:</p>
                    <div class="flex space-x-4">
                        <a href="https://facebook.com" target="_blank" class="hover:text-orange-400">
                            <i class="fab fa-facebook fa-lg"></i> Facebook
                        </a>
                        <a href="https://instagram.com" target="_blank" class="hover:text-orange-400">
                            <i class="fab fa-instagram fa-lg"></i> Instagram
                        </a>
                        <a href="https://linkedin.com" target="_blank" class="hover:text-orange-400">
                            <i class="fab fa-linkedin fa-lg"></i> LinkedIn
                        </a>
                        <a href="https://wa.me/244XXXXXXXXX" target="_blank" class="hover:text-orange-400">
                            <i class="fab fa-whatsapp fa-lg"></i> WhatsApp
                        </a>
                    </div>
                </div>
            </div>

            <!-- Formulário de contacto -->
            <div class="bg-white text-gray-800 p-6 rounded shadow">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contacto.enviar') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nome</label>
                        <input type="text" name="nome" class="w-full border border-gray-300 p-2 rounded" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" class="w-full border border-gray-300 p-2 rounded" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Mensagem</label>
                        <textarea name="mensagem" rows="4" class="w-full border border-gray-300 p-2 rounded" required></textarea>
                    </div>
                    <div>
                        <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-4 py-2 rounded">
                            Enviar Mensagem
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>







    @include('footer')

</body>
</html>
