<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Servers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('servers') }}" method="POST" class="mb-6">
                        @csrf
                        <p class="mb-6 p-6 border-l-4 border-blue-600 bg-blue-100">Get your server id from the Battlematrics. Go to <a class="underline text-blue-500 font-semibold" href="https://www.battlemetrics.com/servers">Battlematrics</a>, search for your server with name. After you find it, click the server and copy the ID from the URL Bar and use it as server id. ID will be the last numbers after /.</p>

                        @if (session('success'))
                            <p class="mb-6 p-6 border-l-4 border-green-600 bg-green-100 w-fit">{{ session('success') }}</p>
                        @endif

                        <div class="flex items-center">
                            <div class="ml-3 w-full">
                                <x-input-label for="name" :value="__('Server Name')" />
                                <x-text-input id="name" class="block mt-1 w-full"
                                                type="text"
                                                name="name"
                                                required />
                    
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="ml-3 w-full">
                                <x-input-label for="server_id" :value="__('Server ID')" />
                                <x-text-input id="server_id" class="block mt-1 w-full"
                                                type="number"
                                                name="server_id"
                                                required />
                                <x-input-error :messages="$errors->get('server_id')" class="mt-2" />
                            </div>
                            <x-primary-button class="mt-6 ml-3">
                                {{ __('Create') }}
                            </x-primary-button>
                        </div>
                    </form>
                    
                    @if (count($servers))
                        <h1 class="text-3xl mb-3 font-semibold">Registered Servers</h1>
                        <table class="w-full text-sm">
                            <tr class="bg-black text-white">
                                <th class="text-start p-2">ID</th>
                                <th class="text-start p-2">Name</th>
                                <th class="text-end p-2">Created</th>
                            </tr>
                            @foreach ($servers as $server)
                                <tr class="odd:bg-gray-100 odd:border-b border-gray-300 last:border-none">
                                    <td class="text-start p-2">{{ $server->server_id }}</td>
                                    <td class="text-start p-2">{{ $server->name }}</td>
                                    <td class="text-end p-2">{{ $server->created_at->format('D d/m/Y H:i:m A') }}</td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p class="text-center">No servers exist. Database is empty</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>