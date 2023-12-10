<x-app-layout>
    <div class="flex h-full">
        <aside class="w-1/5 min-h-screen bg-slate-200 m-8 rounded-md">
            <nav class="flex flex-col items-center">
                <h1 class="bg-slate-300 text-5xl p-4 rounded-md flex px-8">Ambientes</h1>
                <ul class="w-full mt-4 flex items-center justify-center flex-col gap-2 text-slate-500 font-bold text-3xl">
                    <li><a href="pb-4">🖥 Lab 01</a></li>
                    <li><a href="pb-4">🖥 Lab 02</a></li>
                    <li><a href="pb-4">🖥 Lab 03</a></li>
                    <li><a href="pb-4">🖥 Lab 04</a></li>
                </ul>
                <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold px-10 py-4 m-2 mt-4 rounded-full shadow-2xl text-2xl">+ Adicionar</button>
            </nav>
        </aside>
        <main class="w-4/5 bg-white p-4 ml-4">
            <div class="flex items-center justify-center">
                <form class="w-full max-w-md p-4 bg-gray-100 rounded-lg" action="{{ route('dispositivos.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="ambiente_id" value="{{ $ambiente_id }}">
                    <div class="flex items-center justify-center">
                        <h1 class="text-3xl pb-3 font-bold text-center text-blue-500">Criar Ambiente</h1>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold" for="grid-device-name">
                            Marca do dispositivo
                        </label>
                        <input id="marca" name="marca" class="block w-full p-2 text-white-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-white-700 dark:border-white-600 dark:placeholder-white-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" id="grid-device-name" type="text" placeholder="Digite o nome do dispositivo">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold" for="grid-device-description">
                            Estado atual do dispositivo
                        </label>
                        <input id="estado" name="estado" class="block w-full p-2 text-white-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-white-700 dark:border-white-600 dark:placeholder-white-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" id="grid-device-description" type="text" placeholder="Digite a descrição do dispositivo">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold" for="grid-device-description">
                            Temperatura atual do dispositivo
                        </label>
                        <input id="temperatura" name="temperatura" class="block w-full p-2 text-white-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-white-700 dark:border-white-600 dark:placeholder-white-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" id="grid-device-description" type="text" placeholder="Digite a descrição do dispositivo">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold" for="grid-device-description">
                            Número de identificação do aparelho
                        </label>
                        <input id="esp_id" name="esp_id" class="block w-full p-2 text-white-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-white-700 dark:border-white-600 dark:placeholder-white-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" id="grid-device-description" type="text" placeholder="Digite o número de identificação do aparelho">
                    </div>
                    <button class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Cadastrar Dispositivo</button>
                </form>
            </div>
        </main>
    </div>
</x-app-layout>