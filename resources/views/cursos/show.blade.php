  @include('menu')




  <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-md my-44">
      <!-- Cabeçalho -->

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
      <div class="flex justify-between items-center mb-8">
          <h1 class="text-3xl font-bold text-gray-800">{{ $curso->nome }}</h1>
      </div>

      <!-- Imagem -->
      <div class="mb-8">
          @if ($curso->imagem)
              <img src="{{ asset('storage/' . $curso->imagem) }}" alt="{{ $curso->nome }}"
                  class="w-full h-80 object-cover rounded-lg shadow-sm">
          @else
              <div class="w-full h-80 bg-gray-200 rounded-lg flex items-center justify-center text-gray-500">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="w-12 h-12">
                      <path stroke-linecap="round" stroke-linejoin="round"
                          d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                  </svg>
                  Sem imagem
              </div>
          @endif
      </div>


      <!-- Informações do Curso -->
      <div class="space-y-6">
          <!-- Nome -->
          <div class="flex items-start">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-6 h-6 text-blue-600 mr-3">
                  <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
              </svg>
              <div>
                  <h2 class="text-lg font-semibold text-gray-700">Nome do Curso</h2>
                  <p class="text-gray-600">{{ $curso->nome }}</p>
              </div>
          </div>

      </div>

      <!-- Duração -->
      <div class="flex items-start">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-6 h-6 text-blue-600 mr-3">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <div>
              <h2 class="text-lg font-semibold text-gray-700">Duração</h2>
              <p class="text-gray-600">{{ $curso->duracao ?? 'N/A' }}</p>
          </div>
      </div>

      <!-- Custo -->
      <div class="flex items-start">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-6 h-6 text-blue-600 mr-3">
              <path stroke-linecap="round" stroke-linejoin="round"
                  d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <div>
              <h2 class="text-lg font-semibold text-gray-700">Custo</h2>
              <p class="text-gray-600">{{ $curso->custo ? number_format($curso->custo, 2, ',', '.') . 'KZ ' : 'N/A' }}
              </p>
          </div>
      </div>

      <!-- Requisito -->
      <div class="flex items-start">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-6 h-6 text-blue-600 mr-3">
              <path stroke-linecap="round" stroke-linejoin="round"
                  d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <div>
              <h2 class="text-lg font-semibold text-gray-700">Requisito</h2>
              <p class="text-gray-600">{{ $curso->requisito ?? 'N/A' }}</p>
          </div>
      </div>

      <!-- Modalidade -->
      <div class="flex items-start">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-6 h-6 text-blue-600 mr-3">
              <path stroke-linecap="round" stroke-linejoin="round"
                  d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
          </svg>
          <div>
              <h2 class="text-lg font-semibold text-gray-700">Modalidade</h2>
              <p class="text-gray-600">{{ $curso->modalidade }}</p>
          </div>
      </div>

      <!-- Local -->
      <div class="flex items-start">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-6 h-6 text-blue-600 mr-3">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round"
                  d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
          </svg>
          <div>
              <h2 class="text-lg font-semibold text-gray-700">Local</h2>
              <p class="text-gray-600">{{ $curso->local ?? 'N/A' }}</p>
          </div>
      </div>

      <!-- Ofertas -->
      <div class="flex items-start">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-6 h-6 text-blue-600 mr-3">
              <path stroke-linecap="round" stroke-linejoin="round"
                  d="M21 11.25v8.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 109.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1114.625 7.5H12m0 0V21m-8.625-9.75h18c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125h-18c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
          </svg>
          <div>
              <h2 class="text-lg font-semibold text-gray-700">Ofertas</h2>
              <p class="text-gray-600">{{ $curso->ofertas ?? 'N/A' }}</p>
          </div>
      </div>

      <!-- Inscritos -->
      <div class="flex items-start">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-6 h-6 text-blue-600 mr-3">
              <path stroke-linecap="round" stroke-linejoin="round"
                  d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
          </svg>
          <div>
              <h2 class="text-lg font-semibold text-gray-700">Inscritos</h2>
              <p class="text-gray-600">{{ $curso->inscritos }}</p>
          </div>
      </div>




      <!-- Descrição -->
      <div class="flex items-start">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-6 h-6 text-blue-600 mr-3">
              <path stroke-linecap="round" stroke-linejoin="round"
                  d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
          </svg>
          <div>
              <h2 class="text-lg font-semibold text-gray-700">Descrição</h2>
              <p class="text-gray-600">{{ $curso->descricao ?? 'N/A' }}</p>
          </div>
      </div>

      <!-- Botões -->
      <!-- Observação -->
      <div class="mt-8 text-center">
          @guest
              <p class="text-gray-700 font-medium mb-4">
                  Para se inscrever neste curso, é necessário fazer login. Se ainda não tem uma conta, crie uma
                  gratuitamente.
              </p>
          @endguest
      </div>

      <!-- Botões -->
      <div class="mt-4 flex flex-col items-center space-y-4">
          @guest
              {{-- Botões para usuários não autenticados --}}
              <div class="w-full max-w-xs">
                  <!-- Botão para Login -->
                  <a href="{{ route('login') }}"
                      onclick="event.preventDefault(); document.getElementById('redirect-login-form').submit();"
                      class="block w-full text-center bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
                      Já tenho conta – Entrar
                  </a>

                  <form id="redirect-login-form" action="{{ route('login') }}" method="GET" style="display: none;">
                      <input type="hidden" name="redirect_to"
                          value="{{ route('inscricao.curso', ['id' => $curso->id]) }}">
                  </form>
              </div>

              <div class="w-full max-w-xs">
                  <!-- Botão para Registro -->
                  <a href="{{ route('register') }}"
                      onclick="event.preventDefault(); document.getElementById('redirect-register-form').submit();"
                      class="block w-full text-center bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
                      Ainda não tenho conta – Criar Conta
                  </a>

                  <form id="redirect-register-form" action="{{ route('register') }}" method="GET"
                      style="display: none;">
                      <input type="hidden" name="redirect_to"
                          value="{{ route('inscricao.curso', ['id' => $curso->id]) }}">
                  </form>
              </div>
          @endguest

          {{-- Botões para todos (logado e não logado) --}}

          @auth
              {{-- Botão para usuários autenticados --}}
              <div class="w-full max-w-xs">
                  <a href="{{ route('inscricao.curso', ['id' => $curso->id]) }}"
                      class="block w-full text-center bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition">
                      Quero me inscrever
                  </a>
              </div>
          @endauth

          <div class="w-full max-w-xs">
              <!-- Botão de WhatsApp -->
              <a href="https://wa.me/+244945693281?text=Quero%20saber%20mais%20sobre%20o%20curso%20{{ urlencode($curso->nome) }}"
                  target="_blank"
                  class="flex items-center justify-center w-full bg-green-600 text-white px-6 py-3 rounded-lg shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition duration-200">
                  Fale pelo WhatsApp
              </a>
          </div>
      </div>



  </div>


  @include('footer')
