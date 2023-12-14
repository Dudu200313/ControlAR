<x-app-layout>
    <div class="flex h-full">
        <aside class="w-1/5 min-h-screen bg-slate-200 m-8 rounded-md">
            <nav class="flex flex-col items-center">
                <h1 class="bg-slate-300 text-5xl p-4 rounded-md flex px-8">Ambientes</h1>
                <ul class="w-full mt-4 flex items-center justify-center flex-col gap-2">
                    @foreach (\App\Models\Ambientes::all() as $ambiente)
                    <li>
                        <a href="{{ route('dashboard', ['ambiente_id' => $ambiente->id]) }}" class="text-slate-600 font-bold text-4xl">🖥 {{ $ambiente->nome }}</a>
                    </li>
                    @endforeach
                </ul>
                <a href="/ambientes/create">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold px-8 py-3 my-7 rounded-full shadow-2xl text-2xl">+ Adicionar</button>
                </a>
            </nav>
        </aside>
        <main class="w-4/5 bg-white p-4 mt-24">
            @if(isset($ambiente_id))
            <div class="flex">
                @forelse (\App\Models\Dispositivos::where('ambiente_id', $ambiente_id)->get() as $dispositivo)
                <div class="w-1/8 bg-gray-100 rounded-lg p-4 m-4">
                    <div class="flex">
                        <h1 class="text-3xl font-bold text-gray-700 mb-2">{{ $dispositivo->marca }}</h1>
                        <div class="flex ml-96">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 cursor-pointer hover:text-blue-500 cursor:pointer">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 cursor-pointer ml-2 hover:text-red-500 cursor:pointer">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </div>
                    </div>

                    <div class="flex m-0 p-0 justify-center items-center">
                        <img class="w-72" src="https://cdn-icons-png.flaticon.com/512/1530/1530481.png">
                    </div>
                    <div class="flex items-center">
                        <h2 class="text-2xl font-bold text-gray-600">
                            🌡️ {{ $dispositivo->temperatura }}°C
                        </h2>
                        <form action="{{ route('dispositivos.temperatura', ['id' => $dispositivo->id,'esp_id'=>$dispositivo->esp_id])}}" method="POST">
                            @method('PUT')
                            @csrf
                            <input class="m-2 w-24 border-gray-200" id="temperatura" name="temperatura" type="number">
                            <button class="bg-slate-500 text-white rounded-full py-2 px-4 ml-2"> Enviar temperatura </button>
                        </form>
                        @if ($dispositivo->estado == 0)
                        <span class="bg-red-500 text-white py-2 px-4 ml-2">OFF</span>
                        <form action="{{ route('dispositivos.estado', ['esp_id'=>$dispositivo->esp_id, 'message' => "ON"]) }}" method="POST">
                            @csrf
                            <button class="bg-green-500 text-white rounded-full py-2 px-4 ml-2" type="submit" value="on"> Ligar </button>
                        </form>
                        @elseif ($dispositivo->estado == 1)
                        <span class="bg-green-500 text-white py-2 px-4 ml-2">ON</span>
                        <form action="{{ route('dispositivos.estado', ['esp_id'=>$dispositivo->esp_id, 'message' => "OFF"])}}" method="POST">
                            @csrf
                            <button class="bg-red-500 text-white rounded-full py-2 px-4 ml-2" type="submit" value="off"> Desligar </button>
                        </form>
                        @endif
                    </div>
                </div>
                @empty
                <div class="flex items-center justify-center h-screen">
                    <p class="text-4xl font-bold"><span class="text-blue-500">Nenhum</span> dispositivo cadastrado no ambiente.</p>
                </div>
                @endforelse
            </div>

            <div class="fixed bottom-0 left-1/2 transform -translate-x-1/2 mb-10 ">
                <a class="bg-blue-500 hover-bg-blue-700 text-white text-2xl font-bold px-10 py-4 m-10 rounded-full shadow-2xg" href="{{ route('dispositivos.create', ['ambiente_id' => $ambiente_id]) }}"><button>+ Adicionar Ar</button></a>
            </div>

            @else
            <div class="flex items-center justify-center h-screen">
                <p class="text-4xl font-bold">Selecione ou <span class="text-blue-500">crie</span> um ambiente.</p>
            </div>
            @endif
            <!--- 
            <div class="flex justify-center">
                <img src="https://www.svgrepo.com/show/493547/person-who-turns-on-the-air-conditioner.svg" alt="">
            </div>
            --->
        </main>
    </div>
</x-app-layout>