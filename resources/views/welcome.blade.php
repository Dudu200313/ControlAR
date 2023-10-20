<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')

    <title>ControlAR</title>
</head>

<nav class="bg-blue-200 p-4 flex justify-between items-center">
    <a href="nadinha" class="text-white text-4xl font-extrabold tracking-wider">
        Control<span class="text-blue-600">AR</span>
    </a>
    <div>
        <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
           <a href="{{ route('login') }}"> Login</a>
        </button>
        <button class="bg-slate-700 hover:bg-slate-800 text-white font-semibold py-2 px-4 rounded">
          <a href="{{ route('register') }}">  Junte-se </a>
        </button>
    </div>
</nav>

<body>

<div class="w-full h-screen flex items-center justify-center">
  <div class="flex m-10">
    <div class="w-1/2">
      <img src="https://i.ibb.co/vXFDxLc/undraw-winter.png" alt="Image" class="w-full h-auto rounded-lg">
    </div>
    <div class="w-1/2 ml-4 flex flex-col justify-center">
      <h2 class="text-4xl font-extrabold text-center text-blue-600 mb-4">ControlAR</h2>
      <p class="text-gray-800 text-lg leading-7 bg-slate-200 rounded-b-lg p-4 ml-6 mb-6 mr-10">
        "Revolucionamos o controle de temperatura. Apresentamos nosso dispositivo de sensor de ar-condicionado com o poder de ajustar o clima de sua residência ou escritório através do seu dispositivo, via web. Conforto na palma da sua mão."
      </p>
      <button class=" bg-blue-600 text-white py-2 px-4 rounded-full hover:bg-blue-700 animate-bounce mx-auto relative">
        Saiba mais &darr;
      </button>
    </div>
  </div>
</div>


</body>

</html>