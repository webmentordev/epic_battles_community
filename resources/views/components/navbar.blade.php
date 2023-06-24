<nav class="w-full fixed top-0 left-0 z-50 bg-white">
    <div class="max-w-7xl m-auto py-4 px-4 flex items-center justify-between">
        <a class="gaming flex items-center" href="{{ route('home') }}"><img width="45" src="{{ asset('assets/images/epic_logo.png') }}" alt="Kingpin Image"> <span class="ml-3 text-2xl">Epic<span class="text-main">Battles</span></span></a>

        <ul class="flex items-center font-semibold">
            <a class="ml-6" href="{{ route('home') }}">Home</a>
            <a class="ml-6" href="{{ route('stats') }}">Stats</a>
            <a class="ml-6" href="{{ route('show.servers') }}">Servers</a>
            <a class="ml-6" href="https://epicbattles.tip4serv.com" rel="nofollow" target="_blank">Store</a>
            @guest
                <a class="px-5 ml-3 border-r border-gray-200" href="{{ route('login') }}">Login</a>
                <a class="ml-5" href="{{ route('register') }}">Register</a>
            @endguest
            @auth
                <a class="ml-5" href="{{ route('dashboard') }}">Dashboard</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="ml-6 py-2 px-4 rounded-md bg-dark text-white">Logout</button>
                </form>
            @endauth
        </ul>
    </div>
</nav>