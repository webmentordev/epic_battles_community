@extends('layouts.apps')
@section('title', 'EpicBattles — Rust Servers')
@section('content')
    <header class="w-full h-screen bg-center bg-cover relative flex items-center justify-center" style="background-image: url('{{ asset('assets/images/header.jpg') }}')">
        <div class="absolute top-0 left-0 w-full h-full bg-dark bg-opacity-50 backdrop-blur"></div>
        <div class="relative flex flex-col">
            <span class="text-white text-8xl text-center">Epic</span>
            <span class="text-main text-8xl text-center mb-3">Battles</span>
            <ul class="flex items-center m-auto">
                <a href="https://epicbattles.tip4serv.com/" rel="nofollow" target="_blank" class="bg-main hover:bg-dark transition-all text-white py-3 px-5"><span>Store</span></a>
                <a href="https://discord.gg/2AUZUeE7" rel="nofollow" target="_blank" class="bg-main hover:bg-dark transition-all ml-3 text-white py-3 px-5"><span>Discord</span></a>
                <a href="{{ route('show.servers') }}" class="bg-main hover:bg-dark transition-all ml-3 text-white py-3 px-5"><span>Servers</span></a>
            </ul>
        </div>
    </header>
@endsection