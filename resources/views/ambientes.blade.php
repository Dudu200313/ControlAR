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
                <button class="mt-2 mb-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"> + Adicionar</button>
            </nav>
        </aside> 
        <main class="w-4/5 bg-white p-4 ml-4">
            <div class="flex items-center justify-center">
                <form class="w-full max-w-md p-4 bg-gray-100 rounded-lg">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="grid-device-name">
                            Nome do Ambiente
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="grid-device-name" type="text" placeholder="Digite o nome do dispositivo">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="grid-device-description">
                            Descrição do Ambiente
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="grid-device-description" type="text" placeholder="Digite a descrição do dispositivo">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="grid-device-image">
                            Foto do Ambiente
                        </label>
                        <input type="file" id="grid-device-image" name="device-image" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white">
                    </div>
                    <button class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="button">Cadastrar Dispositivo</button>
                </form>
            </div>
        </main> 
    </div>
</x-app-layout>
