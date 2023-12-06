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
                    <div class="mb-4 text-center">
                        <h1>Cadastrar Dispositivo</h1>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="grid-device-name">
                            Marca do dispositivo
                        </label>
                        <input id="marca" name="marca" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="grid-device-name" type="text" placeholder="Digite o nome do dispositivo">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="grid-device-description">
                            Estado atual do dispositivo
                        </label>
                        <input id="estado" name="estado" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="grid-device-description" type="text" placeholder="Digite a descrição do dispositivo">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="grid-device-description">
                            Temperatura atual do dispositivo
                        </label>
                        <input id="temperatura" name="temperatura" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="grid-device-description" type="text" placeholder="Digite a descrição do dispositivo">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="grid-device-description">
                            Número de identificação do aparelho
                        </label>
                        <input id="esp_id" name="esp_id" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="grid-device-description" type="text" placeholder="Digite o número de identificação do aparelho">
                    </div>
                    <button class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Cadastrar Dispositivo</button>
                </form>
            </div>
        </main> 
    </div>
</x-app-layout>