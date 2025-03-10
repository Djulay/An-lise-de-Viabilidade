<x-guest-layout>
    <div class="w-full  md:w-1/2  ">
        <h1 class=" text-center text-3xl font-bold  text-orange-600">Crie uma conta</h1>
        <form method="POST" action="{{ route('register') }}" class="w-full max-w-md bg-white p-6 rounded-lg shadow-md">
            @csrf
            {{-- nome --}}
            <div>
                <label for="name" :value="__('Nome')">Nome</label>
                <input id="name" class="border border-gray-700 rounded-lg bg-transparent block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            {{-- email --}}
            <div class="mt-4">
                <label for="email" :value="__('Email')" >Email</label>
                <input id="email" class="border border-gray-700 rounded-lg bg-transparent block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            {{-- senha --}}
            <div class="mt-4">
                <label for="password" :value="__('Senha')" >Senha</label>
                <input id="password" class="border border-gray-700 rounded-lg bg-transparent block mt-1 w-full" type="password" name="password" required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            {{-- confirmação da senha --}}
            <div class="mt-4">
                <label for="password_confirmation" :value="__('Confirme a senha')" >Confirme a senha</label>
                <input id="password_confirmation" class="border border-gray-700 rounded-lg bg-transparent block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('já tem uma conta?') }}
                    </a>
                    <button class="ml-4 bg-gray-700 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        {{ __('Registrar') }}
                        </button>
            </div>


        </form>
    </div>




</x-guest-layout>

