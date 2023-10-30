<!-- resources/views/components/header-nav.blade.php -->

<nav class="bg-blue-200 p-4 flex justify-between items-center">
    <a href="/" class="text-white text-4xl font-extrabold tracking-wider">
        Control<span class="text-blue-600">AR</span>
    </a>
    <div>
        <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
            <a href="{{ route('login') }}">Login</a>
        </button>
        <button class="bg-slate-700 hover:bg-slate-800 text-white font-semibold py-2 px-4 rounded">
            <a href="{{ route('register') }}">Junte-se</a>
        </button>
    </div>
</nav>