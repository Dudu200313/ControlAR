<x-app-layout>

    <div class="flex h-full">
        <aside class="w-1/5 min-h-screen bg-gray-300 p-2 rounded-md">
            <nav class="flex flex-col items-center mt-20">
                <h1 class="text-lg font-bold mb-2 bg-gray-600 text-white py-2 px-8 rounded-md">SALAS</h1>
                <ul class="w-full mt-4 flex items-center justify-center flex-col gap-2">
                    <li><a href="" class="text-lg text-white font-bold">🖥 Lab 01</a></li>
                    <li><a href="" class="text-lg text-white font-bold">🖥 Lab 02</a></li>
                    <li><a href="" class="text-lg text-white font-bold">🖥 Lab 03</a></li>
                    <li><a href="" class="text-lg text-white font-bold">🖥 Lab 04</a></li>
                </ul>
                <button class="mt-2 mb-2 bg-blue-500 hover-bg-blue-700 text-white font-bold py-2 px-4 rounded-full"> + Adicionar</button>
            </nav>
        </aside>

        <div class="flex items-center justify-center flex-1">
            <form class="bg-white p-3 rounded-lg shadow-md w-96 mx-auto">
                <div class="flex justify-end mb-2">
                    <!-- Botão para fechar o pop-up no canto direito -->
                    <button class="text-sm text-gray-500 hover:text-gray-700 dark:text-red dark:hover:text-red-300 focus:outline-none" onclick="fecharPopUp()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>

                <h1 class="text-center mb-6">Criar Ambiente</h1>

                <div class="mb-3">
                    <label for="large-input" class="block mb-2 text-sm font-medium text-white-900 dark:text-blade">Nome do ambiente</label>
                    <input type="text" id="large-input" class="block w-full p-2 text-white-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-white-700 dark:border-white-600 dark:placeholder-white-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <div class="mb-3">
                    <label for="base-input" class="block mb-2 text-sm font-medium text-white-900 dark:text-black">Descrição do ambiente</label>
                    <input type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-white-700 dark:border-gray-600 dark:placeholder-white-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <div class="mb-3">
                    <!-- Área para upload de fotos -->
                    <input type="file" id="file-upload" class="mb-2">

                    <!-- Botão Criar -->
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-blue" type="button">
                        Criar
                    </button>
                </div>
            </form>
        </div>
    </div>  
</x-app-layout>