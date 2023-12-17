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
                    </li>
                    @endforeach
                </ul>

                <a href="/ambientes/create">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold px-8 py-3 my-7 rounded-full shadow-2xl text-2xl">+ Criar Sala</button>
                </a>
            </nav>
        </aside>
        <main class="w-4/5 bg-white p-4 mt-8">
            @if(isset($ambiente_id))
            @foreach (\App\Models\Ambientes::all() as $ambiente)
            @if ($ambiente->id == $ambiente_id)

            <div class="flex">
                <!--- 
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
                --->
                <h1 class="text-5xl flex pl-2 text-blue-500">{{ $ambiente->nome }}</h1>
            </div>

            @endif
            @endforeach
            <div class="flex">
                @forelse (\App\Models\Dispositivos::where('ambiente_id', $ambiente_id)->get() as $dispositivo)
                <div class="w-1/8 bg-gray-100 rounded-lg p-4 m-4">
                    <div class="flex">
                        <h1 class="text-3xl font-bold text-gray-700 mb-2">{{ $dispositivo->marca }}</h1>
                        <div class="flex ml-96">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 cursor-pointer hover:text-blue-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            <form action="{{ route ('dispositivos.destroy' , ['dispositivo' => $dispositivo->id])}}" method="POST" id="form-delete-{{ $dispositivo->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 cursor-pointer hover:text-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </form>

                        </div>
                    </div>

                    <div class="flex items-center">
                        <h2 class="text-2xl font-bold text-gray-600">
                            🌡️ {{ $dispositivo->temperatura }}°C
                        </h2>
                        <form action="{{ route('dispositivos.temperatura', ['id' => $dispositivo->id,'esp_id'=>$dispositivo->esp_id])}}" method="POST">
                            @method('PUT')
                            @csrf
                            <input class="m-2 w-24 border-gray-200" id="temperatura" name="temperatura" type="number">
                            <button class="bg-slate-500 text-white rounded-full py-2 px-4 ml-4"> Enviar temperatura </button>
                        </form>

                        @if ($dispositivo->estado == 0)
                        <div class="text-center relative h-48 w-48 m-1" style="margin-left: -158px;"> <!--- Switch de OFF --->
                            <p class="text-gray-600 font-bold text-lg"></p>
                            <button class="absolute inset-0 rounded-full pb- transition-transform duration-300 ease-in-out transform mx-auto bg-gray-300 w-24 h-12 " style="top: 70%; transform: translateY(50%);margin-left: -15px ">
                                <span class="absolute left-3 bottom-1 bg-red-100 w-20 h-10 rounded-full" ></span>
                                <span class="absolute left-1 bottom-1 text-center text-white w-12 h-10 rounded-full bg-red-500">OFF</span>
                            </button>
                        </div>

                        <form action="{{ route('dispositivos.estado', ['esp_id'=>$dispositivo->esp_id, 'message' => "ON"]) }}" method="POST">
                            @csrf
                            <button class="bg-green-500 text-white rounded-full py-2 px-8 ml-0 " type="submit" value="on"> Ligar </button>
                        </form>
                        @elseif ($dispositivo->estado == 1)
                        <div class="text-center relative h-48 w-48 m-1" style="margin-left: -158px;";> <!--- Switch de ON --->
                            <p class="text-gray-600 font-bold text-lg"></p>
                            <button class="relative w-24 h-12 bg-gray-300 rounded-full p-3 transition-transform duration-300 ease-in-out transform" style="top: 70%; transform: translateY(50%);margin-left: -15px">
                                <span class="absolute left-3 bottom-1 bg-green-100 w-20 h-10 rounded-full"></span>
                                <span class="absolute left-1 bottom-1 text-center text-white bg-green-500 w-12 h-10 rounded-full">ON</span>
                            </button>
                        </div>
                        <form action="{{ route('dispositivos.estado', ['esp_id'=>$dispositivo->esp_id, 'message' => "OFF"])}}" method="POST">
                            @csrf
                            <button class="bg-red-500 text-white rounded-full py-2 px-4 ml-2" type="submit" value="off"> Desligar </button>
                        </form>
                        @endif
                    </div>
                    <div class="flex m-0 p-0 justify-center items-center"> <!--- Imagem do ar condicionado --->
                        <img class="w-72" src="https://cdn-icons-png.flaticon.com/512/1530/1530481.png">
                    </div>

                </div>
                @empty
                <div class="flex items-center justify-center h-screen">
                    <p class="text-4xl font-bold"><span class="text-blue-500">Nenhum</span> dispositivo cadastrado no ambiente.</p>
                </div>
                @endforelse
            </div>

            <div class="fixed bottom-0 left-1/2 transform -translate-x-1/2 mb-10 ">
                <a class="bg-blue-500 hover-bg-blue-700 text-white text-2xl font-bold px-10 py-4 m-10 rounded-full shadow-2xg hover:bg-blue-600" href="{{ route('dispositivos.create', ['ambiente_id' => $ambiente_id]) }}"><button>+ Adicionar Ar</button></a>
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