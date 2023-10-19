<nav class="bg-blue-200 p-4 flex justify-between items-center">
    <div class="text-white text-4xl font-extrabold tracking-wider">
        Control<span class="text-blue-600">AR</span>
</div>
</nav>

<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">    
        </x-slot>

        <x-validation-errors class="mb-4" />
        

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="flex items-start ">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-16 h-16 ml-2 mb-2">
                    <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                </svg>

                <h1 class="text-2xl ml-21">Cadastrar-se</h1>
            </div>

            <div>
                <x-label for="nome" value="{{ __('Nome') }}" />
                <x-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="old('nome')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Senha') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
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
