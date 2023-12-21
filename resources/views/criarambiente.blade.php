<x-app-layout>
    <div class="flex h-full">
        <aside class="w-1/5 min-h-screen bg-slate-200 m-8 rounded-md">
            <nav class="flex flex-col items-center">
                <h1 class="bg-slate-300 text-5xl p-4 rounded-md flex px-8">Ambientes</h1>
                <ul class="w-full mt-4 flex justify-left flex-col gap-2 pl-10 pt-3">
                    @foreach (\App\Models\Ambientes::all() as $ambiente)
                    <li class="flex items-center hover:bg-slate-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                        </svg>
                        <a href="{{ route('dashboard', ['ambiente_id' => $ambiente->id]) }}" class="text-slate-600 font-bold text-4xl ml-2"> {{ $ambiente->nome }}</a>
                        <!--  botão pra deletar o ambiente na dashboard  -->
                        <form action="{{ route ('ambientes.destroy' , ['ambiente' => $ambiente->id])}}" method="POST" id="form-delete-{{ $ambiente->id }}">
                            @csrf
                            @method('DELETE')
                            <button  type="submit" class="text-sm text-red-500 hover:text-gray-700 dark:text-red dark:hover:text-red-700 focus:outline-none ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" class="mr-2" />
                                </svg>
                        </button>
                        </form>
                    </li>
                    @endforeach
                </ul>
                <a href="/ambientes/create">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold px-8 py-3 my-7 rounded-full shadow-2xl text-2xl">+ Adicionar</button>
                </a>
            </nav>
        </aside>

        <div class="flex items-center justify-center flex-1">
            <form class="bg-white p-3 rounded-lg shadow-md w-96 mx-auto" action="{{ route('ambientes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex justify-end mb-2">
                    <!-- Botão para fechar o pop-up no canto direito -->
                    <button class="text-sm text-red-500 hover:text-gray-700 dark:text-red dark:hover:text-red-700 focus:outline-none" onclick="fecharPopUp()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>

                <div class="flex items-center justify-center">
                    <h1 class="text-3xl pb-3 font-bold text-center text-blue-500">Criar Ambiente</h1>
                </div>


                <div class="mb-3">
                    <label for="nome" class="block text-sm font-medium text-white-900 dark:text-blade">Nome do ambiente</label>
                    <input id="nome" name="nome" type="text" class="block w-full p-2 text-white-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-white-700 dark:border-white-600 dark:placeholder-white-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <div class="mb-3">
                    <label for="descricao" class="block text-sm font-medium text-white-900 dark:text-black">Descrição do ambiente</label>
                    <input id="descricao" name="descricao" type="text" class="block w-full p-2 text-white-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-white-700 dark:border-white-600 dark:placeholder-white-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <div class="mb-3">
                    <!-- Botão Criar -->
                    <div class="flex items-center justify-center">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded focus:outline-none focus:shadow-outline-blue">
                            Criar
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>