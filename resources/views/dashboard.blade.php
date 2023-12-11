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
        <main class="w-4/5 bg-white p-4 ml-4">
            @if(isset($ambiente_id))
            <div class="flex">
                @forelse (\App\Models\Dispositivos::where('ambiente_id', $ambiente_id)->get() as $dispositivo)
                <div class="w-1/8 bg-gray-100 rounded-lg p-4 m-4">
                    <h1 class="text-3xl font-bold text-gray-700">{{ $dispositivo->marca }}</h1>
                    <div class="flex items-center justify-center m-0 p-0">
                        <img class="w-72" src="https://cdn-icons-png.flaticon.com/512/1530/1530481.png" alt="um emoji de ar">
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
                        <form action="{{ route('dispositivos.estado', ['esp_id'=>$dispositivo->esp_id, 'message' => "on"]) }}" method="POST">
                            @csrf
                            <button class="bg-green-500 text-white rounded-full py-2 px-4 ml-2" type="submit" value="on"> Ligar </button>
                        </form>
                        @elseif ($dispositivo->estado == 1)
                        <form action="{{ route('dispositivos.estado', ['esp_id'=>$dispositivo->esp_id, 'message' => "off"])}}" method="POST">
                            @csrf
                            <span class="bg-green-500 text-white py-2 px-4 ml-2">ON</span>
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