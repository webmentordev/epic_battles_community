@extends('layouts.apps')
@section('title', 'Servers — EpicBattles')
@section('content')
    <header class="w-full h-[460px] bg-center bg-cover relative flex items-center justify-center" style="background-image: url('{{ asset('assets/images/servers.jpg') }}')">
        <div class="absolute top-0 left-0 w-full h-full bg-dark bg-opacity-40 backdrop-blur-sm"></div>
        <div class="relative flex flex-col">
            <span class="text-white text-4xl text-center">Battle</span>
            <span class="text-main text-5xl text-center mb-3">Servers</span>
        </div>
    </header>

    <section class="w-full">
        <div class="max-w-3xl m-auto grid grid-cols-2 gap-6 py-[50px]">
            @foreach ($servers as $server)
                <div class="p-3 bg-gray-100 rounded-lg">
                    <img class="rounded-lg" src="{{ $server->server_info['attributes']['details']['rust_headerimage'] }}" alt="{{ $server->name }} Image">
                    <div class="p-3 py-4">
                        <h2 class="font-semibold">{{ $server->server_info['attributes']['name'] }}</h2>
                    </div>
                    <div class="bg-gray-300 overflow-hidden relative mb-2 flex items-center justify-center h-[33px] rounded-lg w-full">
                        <div class="absolute top-0 h-full left-0 bg-green-500" style="width: {{ ($server->server_info['attributes']['players'] / 100) *  $server->server_info['attributes']['maxPlayers'] }}%"></div>
                        <p class="relative text-sm font-semibold">{{ $server->server_info['attributes']['players'] }}/{{ $server->server_info['attributes']['maxPlayers'] }}</p>
                    </div>
                    <a class="py-2 rounded-md p-4 w-full text-center bg-main text-white inline-block" href="steam://connect/{{ $server->server_info['attributes']['ip'] }}:{{ $server->server_info['attributes']['port'] }}">Connect</a>
                </div>
            @endforeach
        </div>
    </section>
@endsection