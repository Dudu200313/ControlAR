<nav class="bg-blue-200 p-4 flex justify-between items-center">
    <a href="{{ route('dashboard') }}" class="text-black text-4xl font-extrabold tracking-wider flex items-center">
        <img src="https://i.ibb.co/VpcFg4T/image.png" class="mr-2 w-8" alt="Logo">
        <span>Control<span class="text-black-600">AR</span></span>
    </a>
    <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded rounded-lg w-48 h-10">
        Saiba-mais
    </button>
</nav>

<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
        </x-slot>

        <x-validation-errors class="mb-4" />


        <form method="POST" action="{{ route('register') }}" class="p-4 rounded ">
            @csrf
            <div class="flex items-start ">
                <h1 class="text-4xl pb-3 font-bold text-center text-blue-500">Cadastrar-se</h1>
            </div>

            <div>
                <x-label for="name" value="{{ __('Nome') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="grid grid-cols-2 gap-4 mt-4">
                <div>
                    <x-label for="password" value="{{ __('Senha') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="Digite aqui" />
                </div>
                <div>
                    <x-label for="password_confirmation" value="{{ __('Confirmar Senha') }}" />
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Digite aqui" />
                </div>
            </div>


            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
                <x-label for="terms">
                    <div class="flex items-center">
                        <x-checkbox name="terms" id="terms" required />

                        <div class="ml-2">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                            ]) !!}
                        </div>
                    </div>
                </x-label>
            </div>
            @endif

            <div class="flex flex-col texte-center items-center mt-4">
                <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-lg ml-2">
                    {{ __('Registrar-se') }}
                </button>

                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Já possui uma conta?') }}
                </a>
            </div>

            </div>

            </div>

            </div>

            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>