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
        <main class="w-4/5 bg-white p-4 ml-4">
            <div class="flex">
                <div class="w-1/2 bg-gray-100 p-4 border border-gray-300 m-4">
                    <h1 class="text-xl text-gray-700 mb-2">ar 1</h1>
                    <div class="flex items-center">
                        
                        <h2 class="text-lg text-gray-600">
                            
                            20°C
                        </h2>
                        <span class="bg-green-500 text-white rounded-full px-2 ml-2">Ligado</span> 
                    </div>
                </div>
                <div class="w-1/2 bg-gray-100 p-4 border border-gray-300 m-4"> 
                    <h1 class="text-xl text-gray-700 mb-2">ar 2</h1>
                    <div class="flex items-center">
                        
                        <h2 class="text-lg text-gray-600">
                            
                            20°C
                        </h2>
                        <span class="bg-red-500 text-white rounded-full px-2 ml-2">Desligado</span> 
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <img src="https://placehold.co/1200x720" alt="">
            </div>
        </main> 
         
    </div>
</x-app-layout>
