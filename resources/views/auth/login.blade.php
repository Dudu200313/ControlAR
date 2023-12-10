<nav class="bg-blue-200 p-4 flex justify-between items-center">
    <a href="{{ route('dashboard') }}" class="text-black text-4xl font-extrabold tracking-wider flex items-center">
        <img src="https://i.ibb.co/VpcFg4T/image.png" class="mr-2 w-8" alt="Logo">
        <span>Control<span class="text-black-600">AR</span></span>
    </a>
    <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg w-48 h-10">
        Saiba-mais
    </button>
</nav>

<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
        </x-slot>

        <x-validation-errors class="mb-4" />
        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif
        <form method="POST" action="{{ route('login') }}" class=" p-4 rounded ">
            @csrf

            <div class="flex items-center">
                <h1 class="text-4xl pb-3 font-bold text-center text-blue-500">Login</h1>
            </div>

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Senha') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Manter conectado') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Esqueceu da senha?') }}
                </a>
                @endif

                <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-lg ml-2">
                    {{ __('Conectar') }}
                </button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>