<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @vite('resources/css/app.css')

  <title>ControlAR</title>
</head>

<nav class="bg-blue-200 p-4 flex justify-between items-center">
  <a href="{{ route('dashboard') }}" class="text-black text-4xl font-bold tracking-wider flex items-center">
    <img src="https://i.ibb.co/VpcFg4T/image.png" class="mr-2 w-8" alt="Logo">
    <span>Control<span class="text-black-600">AR</span></span>
  </a>
  <div class="tracking-widest">
    <button class="bg-slate-700 hover:bg-slate-800 text-white font-semibold py-2 px-4  rounded rounded-lg w-32 h-10 ">
      <a href="{{ route('register') }}">Cadastrar</a>
    </button>
    <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4  rounded rounded-lg w-32 h-10">
      <a href="{{ route('login') }}"> Login</a>
    </button>
  </div>
</nav>

<body>
  <div class="h-screen bg-cover bg-center relative" style="background-image: url('https://i.ibb.co/0jwZyCN/New-Canvas1.png');">
    <div class="absolute inset-0 bg-gradient-to-r from-transparent to-white"></div> <!--- Deixa transparente --->
    <div class="text-blue-500 absolute inset-0 flex flex-col items-end justify-center p-8">
      <h1 class="text-4xl text-slate-700 font-bold mb-4 text-center">ControlAR</h1>
      <p class="text-xl max-w-md">"Apresentamos nosso dispositivo de sensor de ar-condicionado com o poder de ajustar o clima de sua residência ou escritório através do seu dispositivo, via web. Conforto na palma da sua mão."</p>
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mt-4 rounded">Saiba Mais</button>
    </div>
  </div>
</body>

<footer class="bg-slate-800 text-white p-8">
  <div class="container mx-auto flex flex-col md:flex-row justify-between">
    <div class="mb-4 md:mb-0">
      <h2 class="text-2xl font-bold">Contato</h2>
      <p>Email: contato@controlar.com</p>
      <p>Telefone: (11) 1234-5678</p>
    </div>
    <div class="mb-4 md:mb-0">
      <h2 class="text-2xl font-bold">Localização</h2>
      <p>Rua da Loja, 123</p>
      <p>Cidade, Estado</p>
    </div>
    <div>
      <h2 class="text-2xl font-bold">Redes Sociais</h2>
      <p>Siga-nos no Twitter</p>
      <p>Curtir no Facebook</p>
    </div>
  </div>
  <div class="mt-8 text-center">
    <p>&copy; 2023 ControlAR. Todos os direitos reservados.</p>
    <p><b>Desenvolvido por:</b></b></p>
    <p><b> Mateus Lopes - Ian Elton </b></p>
    <p><b>Carolayne Maria - Eduardo Silvino</b></p>
    <p><b>Guilherme Holanda - Afonso Henrique </b></p>
    
  </div>
</footer>


</html>